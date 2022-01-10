<?php

date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=web01";
    private $root="root";
    private $pw="";
    public $table="";
    private $pdo;

    public $title;
    public $button;
    public $header;
    public $append;
    public $upload;
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn, $this->root, $this->pw);

        //把各公開屬性依資料表名稱設定對應內容
        $this->setStr($table);
    }

private function setStr($table){
    switch($table){
        case "title":
            $this->title="網站標題管理";
            $this->button="新增網站標題圖片";
            $this->header="網站標題";
            $this->append="替代文字";
            $this->upload="網站標題圖片";
            break;
        case "ad":
            $this->title="動態文字廣告管理";
            $this->button="新增動態文字廣告";
            $this->header="動態文字廣告";
            $this->append="替代文字";
            $this->upload="網站標題圖片";
            break;
        case "mvim":
            $this->title="動畫圖片管理";
            $this->button="新增動畫圖片";
            $this->header="動畫圖片";
            $this->append="替代文字";
            $this->upload="動畫圖片";
            break;
        case "image":
            $this->title="校園映像資料管理";
            $this->button="新增校園映像圖片";
            $this->header="校園映像資料圖片";
            $this->append="替代文字";
            $this->upload="校園映像圖片";
            break;
        case "bottom":
            $this->title="頁尾版權管理";
            $this->button="新增網站標題圖片";
            $this->header="頁尾版權資料";
            $this->append="替代文字";
            $this->upload="網站標題圖片";
            break;
        case "total":
            $this->title="進站總人數管理";
            $this->button="新增網站標題圖片";
            $this->header="進佔總人數：";
            $this->append="替代文字";
            $this->upload="網站標題圖片";
            break;
        case "news":
            $this->title="最新消息資料管理";
            $this->button="新增最新消息資料";
            $this->header="最新消息資料";
            $this->append="替代文字";
            $this->upload="網站標題圖片";
            break;
        case "menu":
            $this->title="選單管理";
            $this->button="新增主選單";
            $this->header="主選單名稱";
            $this->append="選單連結網址";
            $this->upload="網站標題圖片";
            break;
        case "admin":
            $this->title="管理者帳號管理";
            $this->button="新增管理者帳號";
            $this->header="帳號";
            $this->append="密碼";
            $this->upload="網站標題圖片";
            break;
    }
}

    private function jon($arg){
$sql="";
if(is_array($arg)){
    foreach($arg as $k=>$v){
        $tmp[]="`$k`='$v'";
    }
    $sql="where ".join(" and ",$tmp);
}else{
$sql="where `id`=".$arg;
}
return $sql;
    }
    private function chk($arg){
        $sql="";
        if(!empty($arg[0])&& is_array($arg[0])){
            $sql=$this->jon($arg[0]);
        }
        if(!empty($arg[1])){
            $sql.=" ".$arg[1];
        }
        return $sql;
    }

    public function all(...$arg)
    {
        $sql="select * from $this->table ";
        $sql.=$this->chk($arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function math($math,$col,...$arg)
    {
        $sql="select $math($col) from $this->table ";
        $sql.=$this->chk($arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function sav($arg)
    {
        if(!empty($arg['id'])){
            foreach($arg as $k=>$v){
                if($k!='id')
                    $tmp[]="`$k`='$v'";
            }
            $sql=sprintf("update %s set %s where `id`='%s'",$this->table,join(",",$tmp),$arg['id']);
        }else{
            $sql=sprintf("insert into %s (`%s`) values ('%s')",$this->table,join("`,`",array_keys($arg)),join("','",$arg));
        }
        return $this->pdo->exec($sql);
    }
    public function find($arg)
    {
        $sql="select * from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    public function del($arg)
    {
        $sql="delete from $this->table ";
        $sql.=$this->jon($arg);
        return $this->pdo->exec($sql);
    }
    public function q($arg)
    {
        return $this->pdo->query($arg)->fetchAll(PDO::FETCH_ASSOC);
    }

}
function dd($arg)
    {
        echo "<pre>";
        print_r($arg);
        echo "</pre>";
    }
function to($arg)
    {
        header("location:".$arg);
    }
    $Title=new DB("title");
    $Ad=new DB("ad");
    $Mview=new DB("mview");
    $Image=new DB("image");
    $Menu=new DB("menu");
    $Admin=new DB("admin");
    $News=new DB("news");
    $Total=new DB("total");
    $Bottom=new DB("bottom");

    $tt=$_GET['do']??'';
    switch($tt){
        case "ad":
            $DB=$Ad;
            break;
        case "mvim":
            $DB=$Mvim;
            break;
        case "image":
            $DB=$Image;
            break;
        case "news":
            $DB=$News;
            break;
        case "bottom":
            $DB=$Bottom;
            break;
        case "total":
            $DB=$Total;
            break;
        case "menu":
            $DB=$Menu;
            break;
        case "admin":
            $DB=$Admin;
            break;
        default:
            $DB=$Title;
    }
// $t=new DB("test");
// echo 's.'.$t->sav(["te"=>"hi"]).'<br>';
// echo 's.'.$t->sav(['te'=>'wo']).'<br>';
// dd($t->all(['te'=>'wo'],"order by id desc"));
// dd($t->find(['te'=>'hi']));
// echo 'm.'.$t->math('count','te',['te'=>'hi']).'<br>';
// echo 's.'.$t->sav(['id'=>2,'te'=>'www']).'<br>';
// echo 'd.'.$t->del(2).'<br>';
// dd($t->q('select * from test'));

//在base.php裏判斷使用者是否為新的拜訪者，
//並以session來紀錄此次進站的狀態
if(empty($_SESSION['visited'])){
    $tt=$Total->find(1);
    $tt['total']++;
    $Total->sav($tt);
    $_SESSION['visited']=1;//做個記號
}
?>