<?php
namespace Admin\Controller;
use Think\Controller;
class ArticeController extends CommonController {

	public function lst(){
		$artice = D('artice');
		$where=1;
		$keywords = I('keywords');
		if($keywords){
			$where.=" and title like '%".$keywords."%'";
		}
		$cateid=I('cateid');
		if($cateid){
			$where.=" and a.cateid =".$cateid;
		}
		$count = $artice->alias('a')->where($where)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数()
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show = $Page->show();// 分页显示输出
		$list = $artice->field("a.*,b.name as catename")->alias('a')->join("left join bg_cate b on a.cateid=b.cateid")->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出

		$cate = D('cate');
		$cates =  $cate->cateTree();
		$this -> assign('cates',$cates);

		$this->display();

	}

	public function add(){
		if(IS_POST){
			$artice = D('artice');
			$_POST['time']=time();  //新增时间
			if(!$_FILES['pic']['tmp_name']==''){
				$upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->saveName = array('time','');
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      './Public/Uploads/'; // 设置附件上传根目录
                $upload->rootPath  =      './';
                // 上传单个文件 
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                     $_POST['pic'] = substr($info['savepath'].$info['savename'],1);
                }
			}
			// var_dump($_POST);die;

			if($artice->create()){
				if($artice->add()){
					$this->success('添加文章成功',U('lst'));
				}else{
					$this->error('添加文章失败');
					// $this->error($artice->getError());
				}
			}else{
				$this->error($artice->getError());
				
			}

		}else{
			$cate = D('cate');
			$cates =  $cate->cateTree();
			$this -> assign('cates',$cates);

			$this->display();
		}

		
	}

	public function edit(){
		if(IS_POST){
			$artice = D('artice');
			if($_FILES['pic']['tmp_name']!=''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->saveName = array('time','');
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      './Public/Uploads/'; // 设置附件上传根目录
                $upload->rootPath  =      './';
                // 上传单个文件 
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功 获取上传文件信息
                    $_POST['pic'] = substr($info['savepath'].$info['savename'],1);
                }
            }else{
            	$id=I('id');
                $info = $artice->find($id);
                $_POST['pic'] = $info['pic'];
            }
            if($artice->create()){
            	// var_dump($_POST);die;
            	if($artice->save()){
            		$this->success('修改文章成功！',U('lst'));
            	}else{
            		// echo '???';die;
            		$this->error('收集数据失败');
            		
            	}
            }else{
            	$this->error($artice->getError());
            }
            


		}else{
			$artice = D('artice');

			$id=I('id');
			$artices = $artice->find($id);
			$this -> assign('info',$artices);

			$cate = D('cate');
			$cates =  $cate->cateTree();
			$this -> assign('cates',$cates);

			$this->display();
		}
		
	}

	public function delete($id){
		$artice = D('artice');
		if($artice->delete($id)){
			$this->success('文章删除成功！',U('lst'));
		}else{
			$this->error('删除文章失败');
		}
	}

	public function bdel(){
		$artice = D('artice');
		$ids = I('ids');
		$ids=implode(',', $ids);
		if($ids){
			if($artice->delete($ids)){
				$this->success('文章删除成功！',U('lst'));
			}else{
				$this->error('删除文章失败');
			}
		}else{
			$this->error('没有选中文章！');
		}
	}

}