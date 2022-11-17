<select name="category" id="" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php foreach($category->result() as $key => $data) { ?>
                                    <option value="<?=$data->category_id ?>" <?=$data->category_id == $row->category_id ? "selected"  : null?> ><?=$data->name?></option>
                                <?php } ?>
                            </select>