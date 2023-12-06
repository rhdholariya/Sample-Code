<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\productImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Throwable;

class FetchProductData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-product-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $productSkips = [0,10,20];

        foreach ($productSkips as $key => $skip){
            $this->insertProduct($skip);
        }

        return Command::SUCCESS;
    }

    public function insertProduct($skip)
    {
        try{
            $response = Http::get('https://dummyjson.com/products?limit=10&skip='.$skip)->throw();
            if ($response->successful()) {
                $productBody = json_decode($response->body());
                $productData = $productBody->products;

                foreach ($productData as $key => $product) {
                    $productItem['product_id'] = $product->id;
                    $productItem['title'] = $product->title;
                    $productItem['description'] = $product->description;
                    $productItem['price'] = $product->price;
                    $productItem['discount_percentage'] = $product->discountPercentage;
                    $productItem['rating'] = $product->rating;
                    $productItem['stock'] = $product->stock;
                    $productItem['brand'] = $product->brand;
                    $productItem['category'] = $product->category;
                    $productItem['thumbnail_image'] = $product->thumbnail;

                    $productExist = Product::where('title',$product->title)->first();
                    if(!$productExist){
                        $productRecord = Product::create($productItem);
                        foreach ($product->images as $image) {
                            productImage::create([
                                'product_id' => $productRecord->id,
                                'image' => $image,
                            ]);
                        }
                    }

                }
            }
        } catch (Throwable $e){
            $errorLog = new Logger('Product');
            $errorLog->pushHandler(new StreamHandler(storage_path('logs/product.log')), Logger::INFO);
            $errorLog->info($e->getMessage());
        }
    }
}
