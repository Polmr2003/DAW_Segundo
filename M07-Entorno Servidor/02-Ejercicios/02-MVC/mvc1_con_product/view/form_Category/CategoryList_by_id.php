<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>List by id</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="list" />
            <input type="submit" name="reset" value="reset"  />
        </fieldset>
    </form>
</div>