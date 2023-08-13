<?php

    use function Laravel\Folio\{middleware};

    middleware(['auth', 'verified']);

?>

<div>
    @dd($user)
</div>
