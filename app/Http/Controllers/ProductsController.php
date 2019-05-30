<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Auth;
use Session;
use Image;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductsAttribute;
use DB;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\userreg;
use App\Country;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;

class ProductsController extends Controller
{
   public function addProduct(Request $request){
       if($request->isMethod('post')){
           $data = $request->all();
           if(empty($data['category_id'])){
            return redirect()->back()->with( 'alert-warning','Please select under Category' );
           }
           if(empty($data['brand_id'])){
            return redirect()->back()->with( 'alert-warning','Please select brand' );
           }

//Session::flash('alert-danger', 'danger');
//Session::flash('alert-warning', 'warning');
Session::flash('alert-success', 'success');
//Session::flash('alert-info', 'info');
//$image = $data['image'];
$images = $request->file('image');
$img = time().'_'.$images->getClientOriginalName();
$imgs = $images->move(public_path().'/upload/',$img);



           $product = new Product;
           $product->category_id = $data['category_id'];
           $product->brand_id = $data['brand_id'];
           $product->product_name = $data['product_name'];
           $product->description = $data['description'];
          // $product->company = $data['company'];
           $product->size = $data['size'];
           $product->color = $data['color'];
           $product->price = $data['price'];
           $product->feature = $data['feature'];
           $product->image = $img;
          
           
        // $filename = $image->getClientOriginalName();
        // $request->image->storeAs('public/upload',$filename);
        //   upload image
        //   if($request->hasFile('image')){
        //       echo $image_tmp = Input::file('image');
        //       if($image_tmp->isValid()){
        //           $extension = $image_tmp->getClientOriginalExtension();
        //           $filename = rand(111,99999).'.'.$extension;
        //           $large_image_path = 'images/backend_images/products/large/'.$filename;
        //           $medium_image_path = 'images/backend_images/products/medium/'.$filename;
        //           $small_image_path = 'images/backend_images/products/small/'.$filename;
        //           Resize Images
        //           Image::make($image_tmp)->save($large_image_path);
        //           Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
        //           Image::make($image_tmp)->resize(300,300)->save($small_image_path);

        //          store image name in products table
        //           $product->image = $filename;
        //       }
        //   } 
          if(empty($data['status'])){
              $status = 0;
          }else{
              $status = 1;
          }
          
           $product->status = $status;
           $product->save();
           return redirect()->back();

       }
      //brand dropdown

       $brands = Brand::where(['status'=>1])->get();
       $brand_dropdown = "<option selected disabled>Select</option>";
       foreach($brands as $bad){
        $brand_dropdown .= "<option value='" .$bad->id."'>".$bad->name."</option>";
       }
       //brand dropdown end

       //category dropdown
       $categories = Category::where(['parent_id'=>0])->get();
       $categories_dropdown = "<option selected disabled>Select</option>";
       foreach($categories as $cat){
        $categories_dropdown .= "<option value='" .$cat->id."'>".$cat->name."</option>";
       $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
       foreach($sub_categories as $sub_cat){
           $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
       }
    }
    //category dropdown end
       return view('Admin.products.add_product')->with(compact('categories_dropdown','brand_dropdown'));
   }

   public function editProduct(Request $request, $id=null){
       if($request->isMethod('post')){
           $data = $request->all();

           if($request->hasFile('image')){
           
           $images = $request->file('image');
$img = time().'_'.$images->getClientOriginalName();
$imgs = $images->move(public_path().'/upload/',$img);
           }else{
               $img=$data['current_image'];
           }

           if(empty($data['description'])){
               $data['description']='';
           }
           if(empty($data['feature'])){
            $data['feature']='';
        }
        if(empty($data['status'])){
            $status = 0;
        }else{
            $status = 1;
        }
        


          // echo "<prev>";print_r($data);die;
           Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],
          'brand_id'=>$data['brand_id'],
          'product_name'=>$data['product_name'],
          'description'=>$data['description'],
          'size'=>$data['size'],
          'color'=>$data['color'],
          'feature'=>$data['feature'],
          'price'=>$data['price'],
          'image' =>$img,
        'status'=> $status]);
            return redirect()->back()->with( 'alert-warning','Updated Successfully' );
            //return redirect()->back()->with('success','Updated Successfully');       

       }
       //get product details
     $productDetails = Product::where(['id'=>$id])->first();


     //brand dropdown

     $brands = Brand::where(['status'=>1])->get();
     $brand_dropdown = "<option selected disabled>Select</option>";
     foreach($brands as $bad){
        if($bad->id==$productDetails->brand_id){
            $selected ="selected";
        }else{
            $selected = "";
        }
      $brand_dropdown .= "<option value='" .$bad->id."' ".$selected." >".$bad->name."</option>";
     }
     //brand dropdown end

     //category dropdown
     $categories = Category::where(['parent_id'=>0])->get();
     $categories_dropdown = "<option selected disabled>Select</option>";
     foreach($categories as $cat){
      if($cat->id==$productDetails->category_id){
          $selected ="selected";
      }else{
          $selected = "";
      }
      
        $categories_dropdown .= "<option value='" .$cat->id."' ".$selected.">".$cat->name."</option>";
     $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
     foreach($sub_categories as $sub_cat){
         if($sub_cat->id==$productDetails->category_id){
             $selected = "selected";
         }else{
             $selected="";
         }
         $categories_dropdown .= "<option value = '".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
     }
  }
  //category dropdown end

     return view('Admin.products.edit_product')->with(compact('productDetails','categories_dropdown','brand_dropdown'));


   } 

   public function viewProduct(Request $request){
       $products = Product::orderby('id','DESC')->get();
       $products = json_decode(json_encode($products));
       foreach($products as $key => $val){
           $category_name = Category::where(['id'=>$val->category_id])->first();
           $products[$key]->category_name = $category_name->name;
       }
        foreach($products as $key => $val){
        $brand_name = Brand::where(['id'=>$val->brand_id])->first();
        $products[$key]->brand_name = $brand_name->name;
    }
      
    // echo"<prev>";print_r($products);die;
       return view('Admin.products.view_product')->with(compact('products'));
   }

   public function deleteProduct($id=null){
       Product::where(['id'=>$id])->delete();
       return redirect()->back()->with( 'alert-warning','Product  has been deleted successfully' );
   }

   public function deleteProductImage($id = null){
       Product::where(['id'=>$id])->update(['image'=>'']);
       return redirect()->back()->with( 'alert-warning','Product Image has been deleted successfully' );
   }

   public function deleteAltImage($id = null){
    ProductsImage::where(['id'=>$id])->delete();
    return redirect()->back()->with( 'alert-warning','Product Image has been deleted successfully' );
}

   public function addAttributes(Request $request,$id=null){
       //echo "text";die;
       $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
    //    $productDetails = json_decode(json_encode($productDetails));
       //echo "<pre>";print_r($productDetails);die;
       if($request->isMethod('post')){
           $data=$request->all();
          // echo "<pre>";print_r($data);die;
          foreach($data['code'] as $key => $val){
              if(!empty($val)){

                //Product duplicate code check
                $attrCountCode = ProductsAttribute::where('code',$val)->count();
                if($attrCountCode>0){
                    return redirect()->back()->with('alert-warning','Code already exists! Please add another product code');
                }

                //Prevent Duplicate size
                $attrCountSize = ProductsAttribute::where(['product_id'=>$id,'highlights'=>$data['highlights'][$key]])->count();
                if($attrCountSize>0){
                    return redirect()->back()->with('alert-warning','"'.$data['highlights'][$key].'"Size already exists for this product! Please add another size.');
                }

                  $attribute = new ProductsAttribute;
                  $attribute->product_id = $id;
                  $attribute->code = $val;
                  $attribute->highlights = $data['highlights'][$key];
                  $attribute->specifications = $data['specifications'][$key];
                  $attribute->stock = $data['stock'][$key];
                  $attribute->save();

              }
          }
          return redirect()->back()->with( 'alert-warning','Product Attributes has been added successfully' );
       }
       return view('Admin.products.add_attributes')->with(compact('productDetails'));
   }

   public function editAttributes(Request $request,$id=null){
       if($request->isMethod('post')){
           $data = $request->all();
        //    echo "<pre>"; print_r($data); die;
           foreach($data['idAttr'] as $key => $attr){
               ProductsAttribute::where(['id'=>$data['idAttr'][$key]])->update(['specifications'=>$data['specifications'][$key],'stock'=>$data['stock'][$key]]);
}
return redirect()->back()->with('alert-warning','Products attributes has been updated successfully');
       }
   }

   public function addImages(Request $request,$id=null){
    //echo "text";die;
    

    if($request->isMethod('post')){
        $data = $request->all();
       // echo "<prev>"; print_r($data); die;
       if($request->hasFile('image')){
           $images = $request->file('image');
           foreach($images as $images){
               //upload images
               $image = new ProductsImage;
                $img = time().'_'.$images->getClientOriginalName();
                $imgs = $images->move(public_path().'/upload/',$img);
                $image->image = $img;
                $image->product_id  =$data['product_id'];
                $image->save();
           }
           return redirect()->back()->with( 'alert-warning',' Product images has been added sucessfully' );

       }

    }
    $productDetails = Product::with('attributes')->where(['id'=>$id])->first();

    $productsImg = ProductsImage::where(['product_id'=>$id])->get();
    $productsImg = json_decode(json_encode($productsImg));

    $productsImages = "";
    foreach($productsImg as $img){
    $productsImages .= "<tr>
    <td>".$productDetails->product_name."</td>
    <td>
        <img src='/upload/$img->image' style='width:100px;'>   
        </td>      
    <td> <a rel='$img->id' rel1='delete-alt-image' href='javascript:' class='btn btn-danger btn-mini deleteRecord'>Delete</a></td> </td>
    </tr>";
    }
   

    return view('Admin.products.add_images')->with(compact('productDetails','productsImages'));
}

   public function deleteAttribute($id = null){
       ProductsAttribute::where(['id'=>$id])->delete();
       return redirect()->back()->with( 'alert-warning',' Attribute has been deleted successfully' );


   }

   public function products($name = null){

    //Show 404 page if category name does not exist
    $countCategory = Category::where(['name'=>$name,'status'=>1])->count();
    if($countCategory==0){
        abort(404);
    }

       //Get all categories and sub categories
       $categories = Category::with('categories')->where(['parent_id'=>0])->get();

      $categoryDetails = Category::where(['name' => $name])->first();

      if($categoryDetails->parent_id==0){
          //if name is maincategory name
          $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->where('status',1)->get();
           
          $cat_ids = "";
          foreach($subCategories as $subcat){
          $cat_ids .= $subcat->id.",";
          }
          $productsAll = Product::whereIn('category_id',array($cat_ids))->where('status','1')->get();
      }else{
           //if name is subcategory name

        $productsAll = Product::where(['category_id' => $categoryDetails->id])->where('status','1')->get();

      }
     
      return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
   }
   public function searchProducts(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data);
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

$search_product = $data['product'];
 $productsAll = Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_name',$search_product)->where('status',1)->get();
return view('products.listing')->with(compact('categories','productsAll','search_product')); 



    }
}

   public function product($id = null){

    //show 404 page if product is disabled
    $productsCount = Product::where(['id'=>$id,'status'=>1])->count();
    if($productsCount == 0){
        abort(404);
    }

       //Get product details
       $productDetails = Product::with('attributes')->where('id',$id)->first();
       $productDetails = json_decode(json_encode($productDetails));
       
    //    $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();
    //    $relatedProducts = json_decode(json_encode($relatedProducts));
    //    echo "<prev>"; print_r($relatedProducts); die;


       //get all categories and subcategories
       $categories = Category::with('categories')->where(['parent_id'=>0])->get();

       //get product alternate images
       $productAltImages = ProductsImage::where('product_id',$id)->get();
       //$productAltImages = json_decode(json_encode($productAltImages));

       $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');
       

       return view('products.detail')->with(compact('productDetails','categories','productAltImages','total_stock'));
   }

   public function getProductPrice(Request $request){
       
    $data = $request->all();
    // echo "<prev>"; print_r($data);die; 
    $proArr = explode("-",$data['idsize']);
    //echo $proArr[0]; echo $proArr[1];die;
     $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'highlights'=>$proArr[1]])->first();
     echo $proAttr->specifications; 
     echo "#";
     echo $proAttr->stock;
   }
   public function addtocart(Request $request){
    Session::forget('CouponAmount');
    Session::forget('CouponCode');

       $data = $request->all();
  // echo "<prev>"; print_r($data); die;
    $product_size = explode("-",$data['highlights']);
//  echo  $product_size;
        $getProductStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'highlights'=>$product_size[1]])->first();
       // echo  $getProductStock->stock;die;
        if($getProductStock->stock<$data['quantity'])
        {
            return redirect()->back()->with('alert-warning','Required quantity is not available!');
        }

    
    if(empty(Auth::user()->email)){
        $data['user_email'] = '';    
    }else{
        $data['user_email'] = Auth::user()->email;
    }

    // if(empty($data['session_id'])){
    //     $data['session_id'] = '';
    // }

$session_id = Session::get('session_id');
if(empty($session_id)){
    $session_id = str_random(40); 
    Session::put('session_id', $session_id);
}
    $sizeArr = explode("-",$data['highlights']);

    $countProducts = DB::table('cart')->where(['product_id'=>$data['product_id'],
    'highlights'=>$sizeArr[1],
    'session_id'=> $session_id])->count();

if($countProducts>0){
    return redirect()->back()->with('alert-warning','Product already exist in Cart!');
    

}else{

    $getcode = ProductsAttribute::select('code')->where(['product_id'=>$data['product_id'],'highlights'=>$sizeArr[1]])->first();
  
    DB::table('cart')->insert(['product_id'=>$data['product_id'],
    'product_name'=>$data['product_name'],
    'codes'=> $getcode->code,
    'color'=> $data['color'],
    'price'=> $data['price'],
    'highlights'=>$sizeArr[1],
    'quantity'=> $data['quantity'],
    'user_email'=> $data['user_email'],
    'session_id'=> $session_id]);

}

  

    return redirect('cart')->with('alert-warning','Product has been added to Cart!');;
   }
     
   public function cart(){
    if(Auth::check()){
        $user_email = Auth::user()->email;
        $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
    }else{
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();    
    }

       foreach($userCart as $key => $product){
           $productDetails = Product::where('id',$product->product_id)->first();
           $userCart[$key]->image=$productDetails->image;
       }
    //   echo "<pre>"; print_r($userCart);
       return view('products.cart')->with(compact('userCart'));
   }
   public function deleteCartProduct($id = null){
    //    echo $id; die;
    DB::table('cart')->where('id',$id)->delete();
    return redirect('cart')->with('alert-warning','Product has been deleted from Cart!');
   }

   public function updateCartQuantity($id=null,$quantity=null){  
    $getCartDetails = DB::table('cart')->where('id',$id)->first();
    $getAttributeStock = ProductsAttribute::where('code',$getCartDetails->codes)->first();
    // echo $getAttributeStock->stock; echo"--";
     $updated_quantity = $getCartDetails->quantity+$quantity;
      if($getAttributeStock->stock >= $updated_quantity){
        DB::table('cart')->where('id',$id)->increment('quantity',$quantity); 
        return redirect('cart')->with('alert-warning','Product Quantity has been updated in Cart!');   
      }else{
        return redirect('cart')->with('alert-warning','Required Product Quantity is not available');   
      }
    
       
    }

    public function applyCoupon(Request $request){

        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponCount == 0){
            return redirect()->back()->with('flash_message_error','This coupon does not exists!');
        }else{
            // with perform other checks like Active/Inactive, Expiry date..

            // Get Coupon Details
            $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();
            
            // If coupon is Inactive
            if($couponDetails->status==0){
                return redirect()->back()->with('flash_message_error','This coupon is not active!');
            }

            // If coupon is Expired
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if($expiry_date < $current_date){
                return redirect()->back()->with('flash_message_error','This coupon is expired!');
            }

            // Coupon is Valid for Discount

            // Get Cart Total Amount
            if(Auth::check()){
                $user_email = Auth::user()->email;
                $userCart = DB::table('cart')->where(['user_email' => $user_email])->get();     
            }else{
                $session_id = Session::get('session_id');
                $userCart = DB::table('cart')->where(['session_id' => $session_id])->get();    
            }

            $total_amount = 0;
            foreach($userCart as $item){
               $total_amount = $total_amount + ($item->price * $item->quantity);
            }

            // Check if amount type is Fixed or Percentage
            if($couponDetails->amount_type=="Fixed"){
                $couponAmount = $couponDetails->amount;
            }else{
                $couponAmount = $total_amount * ($couponDetails->amount/100);
            }

            // Add Coupon Code & Amount in Session
            Session::put('CouponAmount',$couponAmount);
            Session::put('CouponCode',$data['coupon_code']);

            return redirect()->back()->with('flash_message_success','Coupon code successfully
                applied. You are availing discount!');

        }
    }


    public function checkout(Request $request){
      $user_id = Auth::user()->id;
        $userDetails = userreg::find($user_id);
        $countries = Country::get();
        
       
        $user_email = Auth::user()->email;
        // $userp = User::find($user_email);
    //    return $user_email;
        
      

       //Check if Shipping Address exists
       $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
    //    $shippingDetails = array();
       if($shippingCount>0){
           $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
       }
       
//update cart table with user email
$session_id = Session::get('session_id');
DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);



        if($request->isMethod('post')){
            $data = $request->all();
           // echo "<prev>"; print_r($data); die;

            //return to checkout page if any of the field is empty
            if(empty($data['billing_name']) ||
            empty($data['billing_address']) ||
            empty($data['billing_city']) ||
            empty($data['billing_state']) ||
            empty($data['billing_country']) ||
            empty($data['billing_pincode']) ||
            empty($data['billing_mobile']) ||
            empty($data['shipping_name']) ||
            empty($data['shipping_address']) ||
            empty($data['shipping_city']) ||
            empty($data['shipping_state']) ||
            empty($data['shipping_country']) ||
            empty($data['shipping_pincode']) ||
            empty($data['shipping_mobile']))
             {
                return redirect()->back()->with('alert-success','Please fill all the fields');
             }
          

         // Update User details
            userreg::where('id',$user_id)->update(['name'=>$data['billing_name'],
            'address'=>$data['billing_address'],
            'city'=>$data['billing_city'],
            'state'=>$data['billing_state'],
            'pincode'=>$data['billing_pincode'],
            'country'=>$data['billing_country'],
            'mobile'=>$data['billing_mobile']]);
            
            // $cartcust=DB::select("select * from tbl_register as r,
            // tbl_city as c,tbl_district as d  where email='$email'and 
            // r.city=c.city_id and c.district_id=d.district_id");

            if($shippingCount>0){
               
                // Update Shipping Address
        
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],
                'address'=>$data['shipping_address'],
                'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'pincode'=>$data['shipping_pincode'],
                'country'=>$data['shipping_country'],'mobile'=>$data['shipping_mobile']]);

            }
            else{
              
              // return  $user_email = Auth::user()->email;
                // Add New Shipping Address
                $shipping = new DeliveryAddress;
                $shipping->user_id = $user_id;
                 $shipping->user_email = $user_email;
                $shipping->name = $data['shipping_name'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->country = $data['shipping_country'];
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->save();
            }
            // echo "hello"; die;
             return redirect()->action('ProductsController@orderReview');
        }

        return view('products.checkout')->with(compact('userDetails','countries','shippingDetails'));
    }
public function orderReview(){
   
    $user_id = Auth::user()->id;
    $user_email = Auth::user()->email;
    $userDetails = userreg::where('id',$user_id)->first();
    
    $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
    $shippingDetails = json_decode(json_encode($shippingDetails ));
    // echo "<pre>";print_r($shippingDetails); die;
    $userCart = DB::table('cart')->where(['user_email'=> $user_email])->get();
    foreach($userCart as $key => $product){
        $productDetails = Product::where('id',$product->product_id)->first();
        $userCart[$key]->image=$productDetails->image;
    }
//    echo "<pre>"; print_r($userCart); die;
  
    return view('products.order_review')->with(compact('userDetails','shippingDetails','userCart'));
}

public function placeOrder(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
         $user_id = Auth::user()->id;
     $user_email = Auth::user()->email;
        // echo "<pre>";print_r($data); die;
        
           // Get Shipping Address of User
            
            $shippingDetails = DeliveryAddress::where(['user_email' => $user_email])->first();
        //      $shippingDetails = json_decode(json_encode( $shippingDetails));
        //  echo "<pre>";print_r($shippingDetails); die;

          //  echo "<pre>";print_r($data); die;
            

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->country = $shippingDetails->country;
            $order->mobile = $shippingDetails->mobile;
             // $order->coupon_code = $coupon_code;
           //  $order->coupon_amount = $coupon_amount;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
            foreach($cartProducts as $pro){
                $cartPro = new OrdersProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->codes;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->color;
                $cartPro->product_size = $pro->highlights;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
            }
            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);

            if($data['payment_method']=="COD"){
                
            

                $productDetails = Order::with('orders')->where('id',$order_id)->first();
                $productDetails = json_decode(json_encode($productDetails),true);
                /*echo "<pre>"; print_r($productDetails);*/ /*die;*/

                $userDetails = userreg::where('id',$user_id)->first();
                $userDetails = json_decode(json_encode($userDetails),true);
                /*echo "<pre>"; print_r($userDetails); die;
*/

               
                /* Code for Order Email Start */
                $email = $user_email;
                $messageData = [
                    'email' => $email,
                    'name' => $shippingDetails->name,
                    'order_id' => $order_id,
                    'productDetails' => $productDetails,
                    'userDetails' => $userDetails
                ];
                Mail::send('emails.order',$messageData,function($message) use($email){
                    $message->to($email)->subject('Order Placed - Nearby Stores');    
                });
                /* Code for Order Email Ends */

                /* Code for Order Email Ends */

                     //Redirect user after saving order
                    return redirect('/thanks');
            }else{
                 //Redirect user after saving order
                 return redirect('/paypal');
            }


    }
}
public function thanks(Request $request){
    $user_email = Auth::user()->email;
    DB::table('cart')->where('user_email',$user_email)->delete();
    return view('orders.thanks');
}
public function paypal(Request $request){
     $user_email = Auth::user()->email;
     DB::table('cart')->where('user_email',$user_email)->delete();
    return view('orders.paypal');
}

public function thanksPaypal(){
  return view('orders.thanks_paypal');
}
public function cancelPaypal(){
    return view('orders.cancel_paypal');
  }

public function userOrders(){
    
    $user_id = Auth::user()->id;
    $orders = Order::with('orders')->where('user_id',$user_id)->orderBy('id','DESC')->get();
    // $orders = json_decode(json_encode($orders));
    // echo "<pre>"; print_r($orders); die;

    return view('orders.user_orders')->with(compact('orders'));
}



public function userOrderDetails($order_id){
    $user_id = Auth::user()->id;
    $orderDetails = Order::with('orders')->where('user_id',$user_id)->first();
    $orderDetails = json_decode(json_encode($orderDetails));
 echo "<pre>"; print_r($orderDetails); die;
    // return view('orders.user_order_details')->with(compact('orderDetails'));
}

public function viewOrders(){
    $orders = Order::with('orders')->orderBy('id','Desc')->get();
    $orders = json_decode(json_encode($orders));
    // echo "<pre>"; print_r($orders); die;
    return view('Admin.orders.view_orders')->with(compact('orders'));
}
public function viewOrderDetails($order_id){
    
    $orderDetails = Order::with('orders')->where('id',$order_id)->first();
    $orderDetails = json_decode(json_encode($orderDetails));
    //  echo "<pre>"; print_r($orderDetails); die;

    $user_id = $orderDetails->user_id;
    $userDetails = userreg::where('id',$user_id)->first();
    $userDetails = json_decode(json_encode($userDetails));
    //  echo "<pre>"; print_r($userDetails);
    return view('Admin.orders.order_details')->with(compact('orderDetails','userDetails'));
}
public function viewOrderInvoice($order_id){
    
    $orderDetails = Order::with('orders')->where('id',$order_id)->first();
    $orderDetails = json_decode(json_encode($orderDetails));
    //  echo "<pre>"; print_r($orderDetails); die;

    $user_id = $orderDetails->user_id;
    $userDetails = userreg::where('id',$user_id)->first();
    // $userDetails = json_decode(json_encode($userDetails));
    //  echo "<pre>"; print_r($userDetails);
    return view('Admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
}

public function updateOrderStatus(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data);
        
        Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
        return redirect()->back()->with('flash_message_success','Order Status has been updated successfully!');

    }

}


}



   
 
