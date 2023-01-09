<?php 



function inputFields($type, $name, $value, $placeholder, $id){
    
    $element = "
    <div class='form-group my-4'>
          <input
            type='$type'
            name='$name'
            value='$value'
            placeholder='$placeholder'
            id='$id'
            class='form-control'
            autocomplete='off'
            required
          />
        </div>
    ";

    echo $element;
    
}


?>