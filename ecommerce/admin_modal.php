<!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                            
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="admin_add_sensor.php?id=<?php echo $field0name ?>">
                                                    <div class="form-group"> 
                                                        <input type="number" class="form-control" name="roll_no" placeholder="Enter number" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Add" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- <div class="modal-footer">
                                                <a href="admin_reject_submit.php?serial_id='.$unique.'&email='.$email.'&item_id='.$item_id.'" class="btn btn-primary" data-dismiss="modal">Add</a>
                                            </div>-->
                                        </div>  
                                    </div>
                                </div>