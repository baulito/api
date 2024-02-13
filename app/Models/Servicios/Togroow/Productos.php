<?php

namespace App\Models\Servicios\Togroow;
use App\Models\Servicios\Togroow\Categoriasproductos;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Productoscantidades;
use App\Models\Servicios\Togroow\Productosopcioncaracteristica;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Productos extends Model
{ 
    /*use HasFactory;
    use Searchable;*/
    protected $table = "store_producto";
    protected $fillable = ['store_producto_nombre', 'store_producto_imagen', 'store_producto_imagen2', 'store_producto_imagen3', 'store_producto_imagen4', 'store_producto_imagen5', 'store_producto_imagen6', 'store_producto_imagen7', 'store_producto_imagen8', 'store_producto_imagen9', 'store_producto_video', 'store_producto_descripcion', 'store_producto_valor', 'store_producto_moneda', 'store_producto_cantidad', 'store_producto_negocio', 'store_producto_categoria', 'store_producto_subcategoria', 'store_producto_subcategoria2', 'store_producto_fecha', 'store_producto_estado', 'store_producto_sku', 'store_producto_promocion', 'store_producto_promocion_tipo', 'store_producto_promocion_valor', 'store_producto_promocion_inicio', 'store_producto_promocion_fin', 'store_producto_promocion_texto', 'store_producto_etiqueta', 'store_producto_etiqueta_color', 'store_producto_tags', 'store_producto_archivo_digital', 'store_producto_sugeridos', 'store_producto_negocio_categoria', 'store_producto_negocio_subcategoria', 'store_producto_tipo', 'store_producto_tipoproducto', 'store_producto_enlace_digital', 'store_producto_tienda', 'store_producto_envio_peso', 'store_producto_envio_dimenciones', 'store_producto_envio_tipo', 'store_producto_envio_local', 'store_producto_envio_nacional', 'store_producto_envio_internacional', 'store_producto_envio_empresa', 'store_producto_correo_cotizacion', 'store_producto_caracteristicas', 'store_producto_caracteristicas_id', 'store_producto_caracteristicas_opciones', 'store_producto_nuevo', 'store_producto_devolucion','store_producto_ubicacion'];
    protected $guarded = ['store_producto_id'];
    protected $primaryKey = 'store_producto_id';
    public $timestamps = false;

    public function categoria(){
        return $this->belongsTo(Categoriasproductos::class,'store_producto_categoria', 'store_categoria_id');
    }

    public function subcategoria(){
        return $this->belongsTo(Categoriasproductos::class,'store_producto_subcategoria', 'store_categoria_id');
    }

    public function subcategoria2(){
        return $this->belongsTo(Categoriasproductos::class,'store_producto_subcategoria2', 'store_categoria_id');
    }
    public function negocio(){
        return $this->belongsTo(Negocio::class,'store_producto_negocio', 'registro_id');
    }
    public function cantidades(){
        $cantidades =  Productoscantidades::where('idproducto',$this->store_producto_id)->get();
        $dcantiddes = [];
        $array = [];
        $array['caracteristicas'] = [];
        $caracteristicas = [];
        foreach ($cantidades as $key => $cantidad) {
           $opciones  = explode(",",$cantidad->ids_opciones);
           $dcantiddes[$key] =[];
           $dcantiddes[$key]['id_opciones'] =$opciones;
           $dcantiddes[$key]['cantidad'] = $cantidad->cantidades;
           foreach ($opciones as $key2 => $idopcion) {
                $opcion = Productosopcioncaracteristica::find($idopcion);
                $opcion->infocaracteristica = $opcion->infocaracteristica();
                $position = $this->searchForId($opcion->infocaracteristica->id,$caracteristicas);
                if($position == -1 ){
                    $opcion->infocaracteristica->opciones = [];
                    array_push($caracteristicas,$opcion->infocaracteristica);
                    $position = $this->searchForId($opcion->infocaracteristica->id,$caracteristicas);
                }
                $positionopcion = $this->searchForId($opcion->id,$caracteristicas[$position]->opciones); 

                if($positionopcion == -1){
                    unset($opcion->infocaracteristica);
                    $opcionesc = $caracteristicas[$position]->opciones;
                    array_push($opcionesc,$opcion);
                    $caracteristicas[$position]->opciones= $opcionesc ;
                }
           }
        }
        $array['caracteristicas'] = $caracteristicas;
        $array['cantidades'] = $dcantiddes;
        return  $array;
    }

    public function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['id'] === $id) {
                return $key;
            }
        }
        return -1;
     }


    public function toSearchableArray()
    {
        $categoria = "";
        if(isset($this->categoria->store_categoria_titulo)){
            $categoria= $this->categoria->store_categoria_titulo;
        }
        $subcategoria = "";
        if(isset($this->subcategoria->store_categoria_titulo)){
            $subcategoria= $this->subcategoria->store_categoria_titulo;
        }
        $subcategoria2 = "";
        if(isset($this->subcategoria2->store_categoria_titulo)){
            $subcategoria2= $this->subcategoria2->store_categoria_titulo;
        }
        $negocio = "";
        $idnegocio = 0;
        if(isset( $this->negocio->registro_nombre)){
            $negocio =  $this->negocio->registro_nombre;
            $idnegocio =  $this->negocio->registro_id;
        }

        return [
            'store_producto_nombre' => strip_tags(html_entity_decode($this->store_producto_nombre)),
            'store_producto_descripcion' => strip_tags(html_entity_decode($this->store_producto_descripcion)),
            'store_producto_categoria' => $this->store_producto_categoria,
            'store_producto_subcategoria' => $this->store_producto_subcategoria,
            'store_producto_subcategoria2' => $this->store_producto_subcategoria2,
            'imagen' => $this->store_producto_imagen,
            'categoria' => strip_tags(html_entity_decode($categoria)),
            'subcategoria' => strip_tags(html_entity_decode($subcategoria)),
            'subcategoria2' => strip_tags(html_entity_decode($subcategoria2)),
            'tags'=> strip_tags(html_entity_decode($this->store_producto_tags)),
            'negocio'=>strip_tags(html_entity_decode($negocio)),
            'marca' => '',
            'store_producto_negocio'=>(int)$idnegocio
        ];
    }

    public function shouldBeSearchable (){
        return true;
    }

    public function searchableFilters(): array
    {
        return ['store_producto_categoria','store_producto_subcategoria','store_producto_subcategoria2'];
    }



}
