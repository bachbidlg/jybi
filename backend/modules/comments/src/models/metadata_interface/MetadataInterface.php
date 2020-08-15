<?php

namespace milkyway\comments\models\metadata_interface;

interface MetadataInterface
{
    public function setPath(array $path = []);
    public function getPath($key = null);
    public function getMetadata();
    public function attributeLabels();
}