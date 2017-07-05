 <form class="form-horizontal" method="post">
            <div class="row">
            <div class="form-group">
                <label for="color" class="col-sm-2 control-label">pick your color here!</label>
                <div class="col-sm-5">
                    <input type="color" class="form-control" id="color" name="color" placeholder="color" 
                        value="<?=$color?>"
                    >
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                <label for="font" class="col-sm-2 control-label">pick your font here!</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="font" name="font" placeholder="font" 
                        value="<?=$font?>"
                    >
                    </div>
                    </div>
                     <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Click to change!</button>
        </div>
                </div>
                </form>

</div>
</div>
<script src="/jquery-1.12.4.min.js"></script>
<script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>