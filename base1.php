<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=web01";
    private $root="root";
    private $pw="";
    private $table="";
    private $pdo;
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn, $this->root, $this->pw);
    }
private function jon($arg){
    if(is_array($arg)){
foreach($arg as $key => $val){
    $tmp[]="`$key`='$val'";
}
$sql="where ".join(" and ",$tmp);
    }else{
$sql="where `id`=".$arg;
    }
    return $sql;
}
private function chk($arg){
    $sql="";
    if(!empty($arg[0])&&is_array($arg[0])){
        $sql=$this->jon($arg[0]);
    }
    if(!empty($arg[1])){
        $sql.=" ".$arg[1];
    }
    return $sql;
}

public function all(...$arg){
$sql="select * from $this->table ";
$sql.=$this->chk($arg);
return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
public function math($math, $col, ...$arg){
    $sql="select $math($col) from $this->table ";
    $sql.=$this->chk($arg);
    return $this->pdo->query($sql)->fetchColumn();
}
public function sav($arg){
    if(!empty($arg['id'])){
        foreach($arg as $key => $val){
            if($key!='id')
                $tmp[]="`$key`='$val'";
        }
        $sql=sprintf("update %s set %s where `id`='%s' ",$this->table,join(",",$tmp), $arg["id"]);
    }else{
$sql=sprintf("insert into %s (`%s`) values ('%s')",$this->table,join("`,`",array_keys($arg)),join("','",$arg));
    }
    // echo $sql;
    return $this->pdo->exec($sql);
    }
    public function del($arg){
        $sql="delete from $this->table ";
    $sql.=$this->jon($arg);
    // echo $sql;
    return $this->pdo->exec($sql);
    }
    public function find($arg){
        $sql="select * from $this->table ";
    $sql.=$this->jon($arg);
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

function to($url){
    header("location:".$url);
}
function dd($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

$t=new DB("test");
echo 's.'.$t->sav(["te"=>"hi"])."<br>";
echo 's.'.$t->sav(["te"=>"wo"])."<br>";
dd($t->all(["te"=>"wo"],"order by `id` desc"));
dd($t->find(["te"=>"hi"]));
echo 'm.'.$t->math("count","te",["te"=>"hi"]).'<br>';
echo 's.'.$t->sav(["id"=>2,"te"=>"www"]).'<br>';
echo 'd.'.$t->del(2).'<br>';
dd($t->q("select * from test"));

?>