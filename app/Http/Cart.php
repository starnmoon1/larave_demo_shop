<?php


namespace App\Http;


class Cart
{
    public $items = null;
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($item, $id)
    {
        $storesItem = [
            'item'=>$item,
            'price'=>$item->price,
            'qty'=>0
        ];
            if ($this->items && array_key_exists($id, $this->items)) {
                $storesItem = $this->items[$id];
            }

            $storesItem['qty']++;
            $storesItem['price'] += $item->price * $storesItem['qty'];
            $this->items[$id] = $storesItem;

            $this->totalQty++;
            $this->totalPrice += $item->price;


    }

    public function remove($id)
    {
        if ($this->items) {
            $productsIntoCart = $this->items;
            if (array_key_exists($id, $productsIntoCart)) {
                $priceProDelete = $productsIntoCart[$id]['price'];
                $this->totalPrice -= $priceProDelete;
                //giam tong so luong san pham co trong gio hang
                $this->totalQty--;
                unset($productsIntoCart[$id]);
                $this->items = $productsIntoCart;
            }
        }
    }

    public function update($request, $id)
    {
        if ($this->items) {
            $itemsIntoCart = $this->items;
            if (array_key_exists($id, $itemsIntoCart)) {
                $itemUpdate = $itemsIntoCart[$id];

                //update tong so luong san pham trong gio hang
                $qtyUpdate = $request->qty - $itemUpdate['qty'];
                $this->totalQty += $qtyUpdate;
                //update tong gia cua gio hang
                $priceUpdate = $itemUpdate['item']->price * $request->qty - $itemUpdate['price'];
                $this->totalPrice += $priceUpdate;
                //update so luong san pham do
                $itemUpdate['qty'] = $request->qty;

                //update tong gia cua san pham do
                $itemUpdate['price'] = $itemUpdate['item']->price * $request->qty;
                $this->items[$id] = $itemUpdate;

            }
        }
    }


}
