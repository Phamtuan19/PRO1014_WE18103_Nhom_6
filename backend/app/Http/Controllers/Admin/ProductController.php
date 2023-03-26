<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Author;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\PublishingHouse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\Product\CreateRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Product;

        $orderType = 'DESC';
        $orderBy = 'created_at';
        $isDelete = null;

        if (!empty($request->isDelete)) {
            $isDelete = $request->isDelete;
        }

        if (!empty($request->orderType)) {
            $orderType = $request->orderType;
        }

        if (!empty($request->orderBy)) {
            $orderBy = $request->orderBy;
        }

        $products = $query->queryProduct($query, $orderBy, $orderType, $isDelete)->paginate(15);

        // dd($products);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        $categories = Categories::all();

        $allPublishingHouse = PublishingHouse::all();

        return view('admin.product.create', compact('authors', 'categories', 'allPublishingHouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {


        $products = new Product();

        $productDetail = new ProductDetail();

        $dataProduct = [
            'product_code' => rand(100000, 9000000),
            'author_id' => $request->author,
            'category_id' => $request->category,
            'publishing_house_id' => $request->publishing_house,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'title' => $request->title,
            'introduction' => $request->introduction,
            'publication_date' => $request->publication_date,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $saveProduct = $products->create($dataProduct);

        $dataWarehouse = [
            'product_id' => $saveProduct->id,
            'import_quantity' => $request->quantity,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Warehouse::create($dataWarehouse);


        if ($saveProduct) {
            $dataDetail = [
                'product_id' => $saveProduct->id,
                'size' => $request->size,
                'page_number' => $request->page_number,
                'weight' => $request->weight,
                'import_price' => $request->import_price,
                'price' => $request->price,
                'promotion_price' => $request->promotion_price,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];

            $saveDetail = $productDetail->create($dataDetail);

            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $index => $image) {
                    $url = Cloudinary::upload($image->getRealPath(), [
                        'folder' => 'PRO1014_WE18103_Nhom_6/Products',
                    ]);

                    $dataImage = [
                        'product_id' => $saveProduct->id,
                        'image_url' => $url->getSecurePath(),
                        'public_id' => $url->getPublicId(),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                    Image::insert($dataImage);
                    // dd('ok');
                }
            }
        }

        return back()->with('msg', 'successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $authors = Author::all();

        $categories = Categories::all();

        $allPublishingHouse = PublishingHouse::all();

        return view('admin.product.show', compact('product', 'authors', 'categories', 'allPublishingHouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->is_deleted = date('Y-m-d H:i:s');

        $product->save();

        return back()->with('msg', "successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $productDetail = ProductDetail::where('product_id', $product->id)->get();

        $dbimage = Image::where('product_id', $product->id)->get();

        $product->author_id = $request->author;
        $product->category_id = $request->category;
        $product->publishing_house_id = $request->publishing_house;
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->introduction = $request->introduction;
        $product->publication_date = $request->publication_date;
        $product->created_at = date("Y-m-d H:i:s");
        $product->updated_at = date("Y-m-d H:i:s");

        if ($product->save()) {

            $dataDetail = [
                'size' => $request->size,
                'page_number' => $request->page_number,
                'weight' => $request->weight,
                'import_price' => $request->import_price,
                'price' => $request->price,
                'promotion_price' => $request->promotion_price,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];

            if ($productDetail[0]->update($dataDetail)) {
                if ($request->hasFile('images')) {
                    $images = $request->file('images');

                    if (empty($images)) {
                        return back()->with('msg', 'successfully uploaded');
                    }


                    foreach ($dbimage as $image) {
                        $image->delete();
                    }


                    foreach ($images as $index => $image) {
                        $url = Cloudinary::upload($image->getRealPath(), [
                            'folder' => 'PRO1014_WE18103_Nhom_6/Products',
                        ]);

                        $dataImage = [
                            'product_id' => $product->id,
                            'image_url' => $url->getSecurePath(),
                            'public_id' => $url->getPublicId(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];

                        Image::insert($dataImage);
                    }
                    return back()->with('msg', 'successfully uploaded');

                }

                return back()->with('msg', 'successfully uploaded');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::destroy($id)) {
            return back()->with('msg', "successfully");
        }

        return back()->with('msg', "error");
    }

    public function replay(Product $product)
    {
        $product->is_deleted = null;

        $product->update();

        return back()->with('msg', 'successfully');
    }
}
