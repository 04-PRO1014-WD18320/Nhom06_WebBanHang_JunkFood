<div class="row mb">
        <div class="boxtrai mr">
                <div class="row mb">
                    
                    <div class="boxtile" style="font-size: 25px;">Sản Phẩm Bạn Cần Tìm<strong><?=$tendm?></strong></div>
                        <div class="row boxcontent ">
                        <?php
                        $boxsp="boxsp";
                        $i=0;
                            foreach ($dssp as $sp) {
                                extract($sp);
                                $linksp="index.php?act=sanphamchitiet&idsp=".$id;
                                $hinh=$img_path.$img;
                                if(($i==2)||($i==5)||($i==8)||($i==11)){
                                    $mr="";
                                }else{
                                    $mr="mr";
                                }
                                echo '<div class="'.$boxsp.' '.$mr.'">
                                <div class="row img"><a href="'.$linksp.'"><img width="249.5px" height="150px" src="'.$hinh.'" alt=""></a></div>
                                    <p style="text-align: center;">'.$price.'</p>
                                    <p style="text-align: center;"><a href="'.$linksp.'">'.$name.'</a></p>
                                </div>';
                            $i+=1;

                            }

                        ?>
                        </div>
                    </div>
            
                
            </div>
            
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
