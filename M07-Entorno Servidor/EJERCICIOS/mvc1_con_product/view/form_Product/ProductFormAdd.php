<div id="content">
    <form method="post" action="">
        <fieldset>
            <legend>Add product</legend>
            <label>Id *:</label>
            <input type="text" placeholder="Id" name="id" value="<?php if (isset($content)) { echo $content->getId(); } ?>" />
            <label>Marca *:</label>
            <input type="text" placeholder="Marca" name="marca" value="<?php if (isset($content)) { echo $content->getMarca(); } ?>" />
            <label>Nom *:</label>
            <input type="text" placeholder="Nom" name="nom" value="<?php if (isset($content)) { echo $content->getNom(); } ?>" />
            <label>Descripcio *:</label>
            <input type="text" placeholder="Descripcio" name="descripcio" value="<?php if (isset($content)) { echo $content->getDescripcio(); } ?>" />
            <label>Preu *:</label>
            <input type="number" placeholder="Preu" name="preu" value="<?php if (isset($content)) { echo $content->getPreu(); } ?>" />

            <label>* Required fields</label>
            <input type="submit" name="action" value="add" />
            <input type="submit" name="reset" value="reset"  />
        </fieldset>
    </form>
</div>