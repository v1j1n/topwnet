<?php

namespace App\Filament\Resources\ContactEnquiries\Pages;

use App\Filament\Resources\ContactEnquiries\ContactEnquiryResource;
use Filament\Resources\Pages\ListRecords;

class ListContactEnquiries extends ListRecords
{
    protected static string $resource = ContactEnquiryResource::class;

    protected static ?string $title = 'Contact Enquiries';

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
