<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function compras(){
        return $this->belongsToMany(Compra::class)->withTimestamps()
        -> withPivot('cantidad', 'precio_compra', 'precio_venta');
    }

    public function ventas(){
        return $this->belongsToMany(Venta::class)->withTimestamps()
        -> withPivot('cantidad', 'precio_venta', 'descuento');
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class)->withTimestamps();
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function presentacione(){
        return $this->belongsTo(Presentacione::class);
    }

    protected $fillable = ['nombre', 'codigo', 'descripcion', 'fecha_vencimiento', 'marca_id',  'img_path'];

    public function handleUploadedImage($image){
        $file = $image;
        $name = time(). $file->getClientOriginalName();
        // $file->move(public_path(), '/img/productos/'.$name);
        $file->move(public_path('img/productos'), $name);
        // Storage::putFileAs('productos', $file, $name, 'public');

        return $name;
    }


    /**
     * Elimina una imagen de la carpeta 'productos'.
     *
     * @param string $imageName
     * @return void
     */
    public function handleRemoveImage($imageName)
    {
        $imagePath = public_path('img/productos/' . $imageName);

        // Verifica si la imagen existe antes de eliminarla
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
