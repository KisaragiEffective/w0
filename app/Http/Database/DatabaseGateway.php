<?php
declare(strict_types=1);
namespace App\Http\Database;

use Log;
use Session;
use Illuminate\Support\Facades\DB;

class DatabaseGateway {
    const TABLE_USER = "users";
    const TABLE_SHOP = "shops";
    /**
    * ユーザーを返却！圧倒的成長！
    */
    public static function getUser(string $uuid): object/*: stdClass */ {
        return DB::select("SELECT * FROM " . TABLE_USER . " WHERE uuid = ?", [$uuid]);
    }

    /**
    * ユーザーを登録！圧倒的成長！
    */
    public static function registerUser(string $uuid, string $ign) {
        DB::insert(
        "INSERT INTO " . TABLE_USER ." VALUES (?, ?, ?)",
        [0, $uuid, $ign]
        );
    }
    
    public static function existsUser(string $uuid): boolean {
        return DB::select("SELECT COUNT(*) as count FROM" . TABLE_USER . " WHERE uuid = ?", [$uuid]) ->count !== 0;
    }
    
    public static function updateUserName(string $uuid, string $newName) {
        // TODO: UPDATE PLAYER'S NAME
    }
    
    public static function select(string $sql, array $parameter = []): int {
        return DB::select($sql, $parameter);
    }
}
