<?php
require_once("resources/view/admin/layouts/header.php");
?>



<div class="row mt-3">
                <div class="col-12">
                    <form action="<?= url('admin/category/store') ?>" method="post">
                        <div class="form-group">
                            <label for="category">category_name</label>
                            <input type="text" class="form-control" id="category" placeholder="football" name="name">
                        </div>
                        
                        <div class="form-group">
                            <label for="select"> parent_id </label>
                            <select class="form-control" id="select" name="parent_id">
                                <option value="">بدون والد</option>
                                <?php foreach($categories as $category) { ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div> 

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>

                </div>
            </div>














<?php
require_once("resources/view/admin/layouts/footer.php");
?>