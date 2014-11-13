<?php
	include('DAO.php');

	class venta{
		var $db;
		/*
			Constructor
		*/
		public function __construct(){
			$this->db = new Dao(array(
					'server-ip' => 'localhost',
					'server_user' => 'root',
					'server_password' => '',
					'server_db' => 'baratillopillo'
				));
		}
		
			public function registrar($pr_nombre,$pr_apellidos,$pr_direccion,$pr_telefono,$pr_nombrebanco,
                    $pr_claveinterbancaria,$pr_email,$pr_password){
				$response = array('done'=> false,'msg'=>'no se pudo registrar el usuario');

				if($pr_email!='' && $pr_password!=''){
					if(!($this->verificarusuario($pr_email))){
						$this->db->query("
							insert into
									usuarios
										(nombre,apellidos,
											direccion,telefono,banco,cuenta,
											correo,password
											)
										values
										('$pr_nombre','$pr_apellidos','$pr_direccion','$pr_telefono','$pr_nombrebanco',
                    '$pr_claveinterbancaria','$pr_email','$pr_password')
										");
						$response['done']=true;
						$response['msg']='Usuario guardado';
					}
					else
						$response['msg']='Ya existe un usuario con ese correo';
				}
				else
					$response['msg']='Llene todo los campos';
				return $response;

			}

			public function registrar2($pr_nombre,$pr_descripcion,$pr_precio,$pr_cantidad,$pr_estado,
                    $pr_categoria){
				$response = array('done'=> false,'msg'=>'no se pudo registrar el usuario');

						$this->db->query("
							insert into
									producto
										(pr_nombre,pr_descripcion,
											pr_precio,pr_cantidad,pr_estado,pr_categoria
											)
										values
										('$pr_nombre','$pr_descripcion','$pr_precio','$pr_cantidad','$pr_estado',
                    					'$pr_categoria')
										");
						$response['done']=true;
				return $response;

			}

			private function verificarusuario($pr_email){
			$res = $this->db->query_array("select count(*) as existe from usuarios where correo = '$pr_email'");

			if(intval($res[0]['existe']) != 0)
				return true;
			else
				return false;
			}

			public function mostrar()
			{
				$res = $this->db->query_array("select * from producto");
				return $res;
			}
		
			public function mostrar2($id)
			{
				$res = $this->db->query_array("select * from producto where pr_id = '$id'");
				return $res;
			}

			public function mostrar3($id)
			{
				$res = $this->db->query_array("select * from producto where pr_categoria = '$id'");
				return $res;
			}
	}