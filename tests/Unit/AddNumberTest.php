<?php
 use App\Helpers\MathHelper;

 it('adds two numbers', function(){

  $add=MathHelper::add(3,5);
  expect($add)->toBe(8);
 });

