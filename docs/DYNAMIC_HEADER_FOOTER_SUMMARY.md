# Dynamic Header & Footer System

## Overview
The header, top header menu (both web and mobile), and footer sections are now fully dynamic, pulling data from the `SiteSetting` model. This eliminates hardcoded values and allows easy management through the Filament admin panel.

## Implementation Details

### 1. View Composer
**File:** `app/View/Composers/SiteDataComposer.php`

A View Composer fetches and caches site settings and services data globally, making it available to header and footer partials without repeated database calls.

**Features:**
- Caches site settings for 1 hour (3600 seconds)
- Caches active services for 1 hour
- Provides three variables to views:
  - `$siteSettings` - All site settings data
  - `$allServices` - All active services (for header menu)
  - `$footerServices` - First 6 services only (for footer)

**Registered in:** `app/Providers/AppServiceProvider.php`
```php
View::composer(['partials.header', 'partials.footer'], SiteDataComposer::class);
```

### 2. Dynamic Data Points

#### Header (Web & Mobile)
- **Email addresses** - Dynamically rendered from `$siteSettings->emails` array
- **Mobile numbers** - Dynamically rendered from `$siteSettings->mobile_numbers` array
- **Social media links** - Facebook, Instagram, X (Twitter), LinkedIn
- **Services menu** - Dynamically populated from active services with proper slugs and titles

#### Footer
- **Services section** - Only first 6 services displayed
- **Contact section** - Physical address, email addresses, mobile numbers
- **Social media** - All social media links from settings

### 3. Cache Management

#### Automatic Cache Clearing
The system automatically clears cached data when:

**Site Settings Updated:**
- File: `app/Filament/Resources/SiteSettings/Pages/EditSiteSetting.php`
- Clears both `site_settings` and `active_services` cache
- Shows success notification to admin

**Services Modified:**
- File: `app/Observers/ServiceObserver.php`
- Registered in: `app/Providers/AppServiceProvider.php`
- Clears `active_services` cache on create, update, or delete

#### Manual Cache Clearing
```bash
php artisan cache:clear
```

### 4. Database Structure

#### SiteSetting Model
**Table:** `site_settings`

**JSON Fields:**
- `emails` - Array of email addresses
- `mobile_numbers` - Array of phone numbers

**String Fields:**
- `address` - Physical address
- `footer_note` - Footer description
- `facebook_url` - Facebook page URL
- `instagram_url` - Instagram profile URL
- `x_url` - X (Twitter) profile URL
- `linkedin_url` - LinkedIn company page URL
- `google_map_url` - Google Maps embed iframe code

**Banner Fields:**
- `client_banner`
- `partner_banner`
- `contact_banner`
- `aboutus_banner`
- `services_banner`

### 5. Filament Admin Panel

#### Resource
**File:** `app/Filament/Resources/SiteSettings/SiteSettingResource.php`

**Navigation:**
- Icon: Settings cog icon
- Label: "Site Settings"
- Sort Order: 99 (appears at bottom of menu)

#### Form Schema
**File:** `app/Filament/Resources/SiteSettings/Schemas/SiteSettingForm.php`

**Sections:**
1. **Contact Information**
   - Email addresses (repeater field)
   - Mobile numbers (repeater field)
   - Physical address
   - Footer note

2. **Social Media Links**
   - Facebook, Instagram, X, LinkedIn URLs
   - URL validation with https:// prefix

3. **Google Map** (collapsible)
   - Textarea for embed code

4. **Page Banners** (collapsible)
   - File upload fields for each page banner
   - Stored in `public/storage/banners/`

### 6. Data Seeding

**File:** `database/seeders/SiteSettingSeeder.php`

Seeds initial site settings with Top World Networks data:
```bash
php artisan db:seed --class=SiteSettingSeeder
```

Uses `updateOrCreate` to prevent duplicate records.

## Usage Examples

### Accessing Data in Blade Templates

#### Email Addresses
```blade
@if($siteSettings->emails && count($siteSettings->emails) > 0)
    @foreach($siteSettings->emails as $email)
        <a href="mailto:{{ $email }}">{{ $email }}</a>
    @endforeach
@endif
```

#### Mobile Numbers
```blade
@if($siteSettings->mobile_numbers && count($siteSettings->mobile_numbers) > 0)
    @foreach($siteSettings->mobile_numbers as $mobile)
        <a href="tel:{{ str_replace(' ', '', $mobile) }}">{{ $mobile }}</a>
    @endforeach
@endif
```

#### Services Loop (Footer - First 6 Only)
```blade
@forelse($footerServices as $service)
    <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
@empty
    <li><a href="#">No services available</a></li>
@endforelse
```

#### Services Menu (Header - All Services)
```blade
@forelse($allServices as $service)
    <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
@empty
    <li><a href="#">No services available</a></li>
@endforelse
```

## Benefits

1. **Single Source of Truth** - All contact and social data managed in one place
2. **Performance** - Caching prevents repeated database queries on every page load
3. **Automatic Updates** - Cache clears automatically when data changes
4. **Easy Management** - Non-technical users can update via Filament admin panel
5. **Consistency** - Same data displayed across web and mobile headers/footers
6. **Scalability** - Easy to add more services or contact methods

## Files Modified/Created

### Created Files
- `app/View/Composers/SiteDataComposer.php`
- `app/Observers/ServiceObserver.php`
- `app/Filament/Resources/SiteSettings/SiteSettingResource.php`
- `app/Filament/Resources/SiteSettings/Schemas/SiteSettingForm.php`
- `app/Filament/Resources/SiteSettings/Tables/SiteSettingsTable.php`
- `app/Filament/Resources/SiteSettings/Pages/ListSiteSettings.php`
- `app/Filament/Resources/SiteSettings/Pages/CreateSiteSetting.php`
- `app/Filament/Resources/SiteSettings/Pages/EditSiteSetting.php`

### Modified Files
- `app/Providers/AppServiceProvider.php`
- `resources/views/partials/header.blade.php`
- `resources/views/partials/footer.blade.php`
- `database/seeders/SiteSettingSeeder.php`

## Maintenance

### Adding New Social Media Platform
1. Add migration to add new field to `site_settings` table
2. Update `SiteSetting` model `$fillable` array
3. Add field to Filament form schema
4. Update seeder with sample data
5. Add to header/footer blade templates

### Adding New Contact Method
1. Follow same steps as social media
2. Decide if it should be a JSON array or single field
3. Update casts in model if JSON array
4. Use repeater field in Filament if JSON array

## Testing Checklist

- [ ] Site settings display correctly in header (web)
- [ ] Site settings display correctly in mobile menu
- [ ] Site settings display correctly in footer
- [ ] Services menu shows all active services
- [ ] Footer shows only first 6 services
- [ ] Social media links open in new tab
- [ ] Email links work correctly
- [ ] Phone links work correctly
- [ ] Cache clears automatically when settings updated
- [ ] Cache clears automatically when services modified
- [ ] Filament form saves data correctly
- [ ] Data persists after page refresh

## Future Enhancements

1. Add logo upload field to site settings
2. Add business hours field
3. Add WhatsApp business number
4. Add multi-language support for contact info
5. Add analytics tracking IDs to site settings
6. Add custom CSS/JS injection fields

