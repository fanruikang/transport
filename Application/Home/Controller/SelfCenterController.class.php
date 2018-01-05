<?php
namespace Home\Controller;
use Think\Controller;
class SelfCenterController extends Controller {
	/*首页展示*/
    public function selfCenter(){
        $this->show();
    }
    public function addCar(){
        $id = $_POST["id"];
        $weight =$_POST["weight"];
        $length =$_POST["length"];
        $width =$_POST["width"];

        //$passwd = Request::instance()->post('passwd');

        //添加车辆
        $car = M("car"); // 实例化User对象
        // 查找car.no 值为$_POST["id"]的用户数据
        $condition["car_no"] =$id;
        if($data = $car->where($condition)->find()){
            $this->error("该车辆已被注册，请重试");
        }
        $newCar = [
            'driver_id'=>$_SESSION["userId"],
            'car_no'=> $id,
            'car_weight'=>$weight,
            'car_length'=>$length,
            'car_width'=>$width
        ];

        $car->add($newCar);
        $this->success("添加成功");
    }
}
