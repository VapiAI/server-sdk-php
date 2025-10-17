<?php

namespace Vapi\Types;

enum AzureCredentialService: string
{
    case Speech = "speech";
    case BlobStorage = "blob_storage";
}
