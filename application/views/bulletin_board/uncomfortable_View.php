<div class="container">
    <div class="row">
        <div>
            <!-- TWEET WRAPPER START -->
            <div class="col-md-10 twt-wrapper">
                <div class="panel panel-info">
                    <div class="panel-body" align="right">
                        <table class="table boardtable">
                            <thead>
                            <tr class="boardtitle">
                                <th colspan="2">QNA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="boardnick">Nick : <?php echo $b_Arr->u_nick ?></td>
                                <td class="boarddate"><?php echo $b_Arr->b_date ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="board-content"><?php echo $b_Arr->b_content ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- TWEET WRAPPER END -->
    </div>
</div>