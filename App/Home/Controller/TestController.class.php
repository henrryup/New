<?php
class TestController extends Controller{
    public function test(){
        $this->smarty->display('index.html');
    }
}
?>