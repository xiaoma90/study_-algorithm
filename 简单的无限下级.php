<?php
namespace app\index\controller;

use think\Controller;
use think\Db;


class Test extends Controller
{
    protected $parent;
    protected $childs;
    protected $childs_data;

    public function person()
    {
       $phone = ['18801285590','13683591838','18600504913','18811188886','17050062177','13661074693','15210301173','13810778346'];
        foreach ($phone as $key => $value) {
            $data = db('users')->where('phone',$value)->find();
            dump($data['id']);
        }
    }

    public function test()
    {
        // $children = $this->get_childs([394]);//84   130
        // $children = $this->get_childs([396]);//408       648
        $children = $this->get_childs([397]);
     //    $children = $this->get_childs([398]);
     //    $children = $this->get_childs([401]);
        // $children = $this->get_childs([402]);#
     //    $children = $this->get_childs([403]);
     //    $children = $this->get_childs([406]);
    	// $children = $this->get_childs([407]);
        dump($this->childs);
        dump($this->childs_data);die;
    	$num = 0;
        Db::startTrans();
        try {
            foreach ($children as $key => $value) {
                // $num += count($value);
                if($value){
                    db('user_position')->where(['uid'=>['in',$value]])->delete();
                    foreach ($this->childs_data[$key] as $k => $v) {
                         $this->position($v['id'],$v['pid']);
                    }
                }
            }
            Db::commit();  
        } catch (\Exception $e) {
            throw new \Exception($e);
            Db::rollback();
        }
    
    	
        // dump($num);
        dump('success');
    }

    #获取所有下级
    public function get_childs($uid,$i=1)
    {
    	if(empty($uid)){
    		return $this->childs;
    	}
    	$data = db('users')->where(['pid'=>['in',$uid]])->column('id');
    	$data2 = db('users')->where(['pid'=>['in',$uid]])->field('id,pid')->select();
    	$this->childs[$i] = $data;
    	$this->childs_data[$i] = $data2;
		$i++;
    	return $this->get_childs($data,$i);

    }

    // function genTree5($items) { 
    //     foreach ($items as $item) 
    //         $items[$item['pid']]['son'][$item['id']] = &$items[$item['id']]; 
    //     return isset($items[0]['son']) ? $items[0]['son'] : array(); 
    // } 
      
    // function genTree9($items) {
    //     $tree = array(); //格式化好的树
    //     foreach ($items as $item)
    //         if (isset($items[$item['pid']]))
    //             $items[$item['pid']]['son'][] = &$items[$item['id']];
    //         else
    //             $tree[] = &$items[$item['id']];
    //     return $tree;
    // }
 

    public function position($id,$pid)
    {
        $table = ['user_position','user_position1'];
        $tb = $table[0];
        $pidInfo = db($tb)->where('uid',$pid)->field('pid,lay')->select();
        #添加节点关系
        $action = [];
        if ( empty($pidInfo) ) {

            $action['uid'] = $id;
            $action['pid'] = $pid;
            $action['lay'] = 1;
            $action['created_at'] = date('YmdHis');
            db($tb)->insert($action);
        }else{
            $action[0]['uid'] = $id;
            $action[0]['pid'] = $pid;
            $action[0]['lay'] = 1;
            $action[0]['created_at'] = date('YmdHis');
            foreach ($pidInfo as $k => $v) {
                $action[$k + 1]['uid'] = $id; 
                $action[$k + 1]['pid'] = $v['pid']; 
                $action[$k + 1]['lay'] = $v['lay'] + 1; 
                $action[$k + 1]['created_at'] = date('YmdHis');
            }
            db($tb)->insertAll($action);
        }

    }


}