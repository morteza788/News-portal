<?php
require_once("resources/view/admin/layouts/header.php");
?>



<div class="row mt-3">
                <div class="col-12">
                    <form action="<?= url('admin/category/update/'. $category['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="name" value="<?= $category['name'] ?>">
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div> -->

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>

                </div>
            </div>














<?php
require_once("resources/view/admin/layouts/footer.php");
?>