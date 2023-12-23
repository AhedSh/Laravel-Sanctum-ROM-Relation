<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;


class ProductController extends Controller
{

    
    public function AddProduct(ProductRequest $request){

        $product=new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->size = $request->size;
        $product->price = $request->price;

        $product->save();
        return "new record has been added";

    }

    public function AddCategory(CategoryRequest $request){

        $category=new Category;
        $category->name=$request->name;

        if($request->sale==null)
        $category->sale='';
        else
        $category->sale=$request->sale;

        $category->save();
        return "new record has been added";


    }


        public function GetCategory(){

        $product=Product::find(1);


        return $product->category->sale;
          }



       public function GetProduct(){

        $product=Product::all();

        return $product;
       }


       public function GetOrderProduct(){

        $product=OrderProduct::all();

        return $product;
       }



       public function AddOrder(Request $request){


        $order=new Order;
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;

        $orderProducts=$request->orderProducts;

         $order->save();
         return "new record has been added";


    }


    public function AddorderProduct(Request $request){

        
        $orderproduct=new OrderProduct;
        $orderproduct->order_id = $request->order_id;
        $orderproduct->product_id = $request->product_id;
        $orderproduct->quantity = $request->quantity;
      

        $orderproduct->save();
        return "new record has been added";

    }


    public function getOrderDetails(){
                

        $order=Order::find(6);

        $orderproducts=$order->orderproduct;

         $products=[];

            foreach($orderproducts as $p)
            {

                $product=Product::find($p->product_id);
                $product->quantity=$p->quantity;

                    $products[]=[
                    'name' =>$product->name,
                    'size' =>$product->size,
                    'quantity' =>$product->quantity,

                    ];
    
            }


            return $products;


            }




}
