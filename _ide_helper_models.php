<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $id_profile
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Models\CoreModel\CoreProfile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIdProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CoreProfile
 *
 * @property int $id
 * @property string $name
 * @property string $descripcion
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoreModel\CoreModule[] $module
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoreModel\CoreModule[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreProfile whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreProfile whereUpdatedAt($value)
 */
	class CoreProfile extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CoreSysLog
 *
 * @property string $date
 * @property int $id_user
 * @property string $info
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreSysLog whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreSysLog whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreSysLog whereInfo($value)
 */
	class CoreSysLog extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CorePermission
 *
 * @property int $id
 * @property int $id_module
 * @property int $id_profile
 * @property int $rread
 * @property int $wwrite
 * @property int $eedit
 * @property int $ddelete
 * @property-read \App\Models\CoreModel\CoreModule $module
 * @property-read \App\Models\CoreModel\CoreProfile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereDdelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereEedit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereIdModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereIdProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereRread($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CorePermission whereWwrite($value)
 */
	class CorePermission extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CoreGroupModule
 *
 * @property int $id
 * @property string $desc
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreGroupModule whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreGroupModule whereId($value)
 */
	class CoreGroupModule extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CoreLog
 *
 * @property string $fecha
 * @property int $id_user
 * @property string $module
 * @property string $dato
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreLog whereDato($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreLog whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreLog whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreLog whereModule($value)
 */
	class CoreLog extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CoreFile
 *
 * @property int $id_file
 * @property string $name
 * @property int $size
 * @property string $mime
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreFile whereIdFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreFile whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreFile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreFile whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreFile whereUpdatedAt($value)
 */
	class CoreFile extends \Eloquent {}
}

namespace App\Models\CoreModel{
/**
 * App\Models\CoreModel\CoreModule
 *
 * @property int $id
 * @property string $name
 * @property string $descripcion
 * @property int $id_group
 * @property string $links
 * @property string $file
 * @property string $image
 * @property int $visible
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\CoreModel\CoreGroupModule $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoreModel\CoreProfile[] $module2
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoreModel\CoreProfile[] $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereIdGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CoreModel\CoreModule whereVisible($value)
 */
	class CoreModule extends \Eloquent {}
}

namespace App\Models\SysModel{
/**
 * App\Models\SysModel\SysUbicaciones
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysUbicaciones whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysUbicaciones whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysUbicaciones whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysUbicaciones whereUpdatedAt($value)
 */
	class SysUbicaciones extends \Eloquent {}
}

namespace App\Models\SysModel{
/**
 * App\Models\SysModel\SysArtista
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysArtista whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysArtista whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysArtista whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysArtista whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysArtista whereUpdatedAt($value)
 */
	class SysArtista extends \Eloquent {}
}

namespace App\Models\SysModel{
/**
 * App\Models\SysModel\SysObra
 *
 * @property int $id
 * @property string $n_inv
 * @property int $id_artista
 * @property string $titulo
 * @property string|null $tecnica
 * @property string|null $dimension
 * @property string|null $ano
 * @property string|null $edicion
 * @property string|null $procedencia
 * @property string|null $catalogo
 * @property string|null $certificacion
 * @property string|null $valoracion
 * @property int $id_ubica
 * @property string|null $file1
 * @property string|null $file2
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\SysModel\SysArtista $artist
 * @property-read \App\Models\SysModel\SysUbicaciones $location
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereCatalogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereCertificacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereDimension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereEdicion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereFile1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereFile2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereIdArtista($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereIdUbica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereNInv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereProcedencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereTecnica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SysModel\SysObra whereValoracion($value)
 */
	class SysObra extends \Eloquent {}
}

