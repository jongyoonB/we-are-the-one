<input type="hidden" id="category_Num" value="<?php echo $this->b_category ?>">
<input type="hidden" id="a_href" value="<?php echo URL ?>bulletin_board/uncomfortable_View/">

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <table class="table table-hover table-bordered qna-table">
                <thead>
                <tr class="board-title">
                    <th class="tnum">순번</th>
                    <th class="ttitle">제목</th>
                    <th class="tnick">닉네임</th>
                    <th class="tdate">날짜</th>
                </tr>
                </thead>

                <tbody id="bulletin_board">

                </tbody>
            </table>
	   <div align="right">
                 <button>글쓰기</button>
           </div>

        </div>
    </div>
</div>
