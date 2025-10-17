<?php

namespace Vapi\Types;

enum UpdateAzureCredentialDtoService: string
{
    case Speech = "speech";
    case BlobStorage = "blob_storage";
}
