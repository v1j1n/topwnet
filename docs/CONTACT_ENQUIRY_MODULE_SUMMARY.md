# Contact Enquiry Resource Module - Complete Documentation

## Overview
A complete **read-only** Contact Enquiry management system for viewing and managing "Contact Us" form submissions from the website. This is designed as an inbox for viewing user-submitted contact requests with no create or edit functionality.

## Features Implemented

### ✅ Core Functionality
- **Paginated Table** - View all contact enquiries in a clean, organized table
- **Individual Delete** - Delete single enquiries with confirmation
- **Bulk Delete** - Select and delete multiple enquiries at once
- **View Details Page** - Detailed view of each contact enquiry
- **Search & Sort** - Search by name, email, phone, or message
- **Read-Only** - No create or edit functionality (inbox-style)

### ✅ Navigation
- Menu item: **"Contact Enquiries"**
- Icon: Envelope icon (OutlinedEnvelope)
- Fully integrated with Filament admin panel

## Database Schema

### Table: `contact_enquiries`

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| id | bigint | ✅ | Primary key |
| name | string | ✅ | Contact's name |
| email | string | ✅ | Email address |
| phone | string | ✅ | Phone number |
| message | text | ✅ | Contact message |
| created_at | timestamp | ✅ | Submission date/time |
| updated_at | timestamp | ✅ | Last updated |

## Created Files

### 1. Model
- **Location**: `app/Models/ContactEnquiry.php`
- **Features**:
  - Fillable fields: name, email, phone, message
  - Clean, simple model structure
  - HasFactory trait for testing

### 2. Migration
- **Location**: `database/migrations/2025_10_26_200917_create_contact_enquiries_table.php`
- **Fields**: All contact enquiry fields with proper types and constraints
- **Status**: ✅ Migrated successfully

### 3. Factory
- **Location**: `database/factories/ContactEnquiryFactory.php`
- **Generates**: Realistic contact enquiry data for testing
- **Fields**:
  - Name: Generated using `fake()->name()`
  - Email: Safe email addresses via `fake()->safeEmail()`
  - Phone: Phone numbers via `fake()->phoneNumber()`
  - Message: Paragraphs of text via `fake()->paragraph(3)`

### 4. Seeder
- **Location**: `database/seeders/ContactEnquirySeeder.php`
- **Contains**: 20 sample contact enquiries (10 hand-crafted + 10 from factory)
- **Features**:
  - Realistic business scenarios (web dev, mobile apps, e-commerce, etc.)
  - Diverse contact types (startups, enterprises, nonprofits, education)
  - Staggered timestamps from 7 days ago to recent
- **Usage**: `php artisan db:seed --class=ContactEnquirySeeder`

### 5. Filament Resource
- **Location**: `app/Filament/Resources/ContactEnquiries/ContactEnquiryResource.php`
- **Configuration**:
  - Navigation label: "Contact Enquiries"
  - Model label: "Contact Enquiry"
  - Plural label: "Contact Enquiries"
  - Icon: Envelope (Heroicon::OutlinedEnvelope)
  - **Read-only**: `canCreate()` returns `false`
  - Pages: List and View only (no Create/Edit)

### 6. Table Schema
- **Location**: `app/Filament/Resources/ContactEnquiries/Tables/ContactEnquiriesTable.php`
- **Columns**:
  - Name (searchable, sortable)
  - Email (searchable, sortable, copyable)
  - Phone (searchable, sortable)
  - Message (searchable, truncated to 50 chars, toggleable)
  - Submitted At (date/time, sortable, toggleable)
- **Features**:
  - Default sort: created_at descending (newest first)
  - Row actions: View, Delete
  - Toolbar actions: Bulk Delete

### 7. Infolist Schema
- **Location**: `app/Filament/Resources/ContactEnquiries/Schemas/ContactEnquiryInfolist.php`
- **Features**:
  - Section: "Contact Enquiry Details"
  - 2-column layout for better presentation
  - Fields displayed:
    - Name
    - Email
    - Phone Number
    - Message (full width)
    - Submitted At (formatted date)
  - All fields use Placeholder components for read-only display

### 8. View Page
- **Location**: `app/Filament/Resources/ContactEnquiries/Pages/ViewContactEnquiry.php`
- **Features**:
  - Detailed view of single contact enquiry
  - Section layout with all fields
  - Delete action in header
  - Page title: "View Contact Enquiry"
  - Read-only display using infolist

### 9. List Page
- **Location**: `app/Filament/Resources/ContactEnquiries/Pages/ListContactEnquiries.php`
- **Features**:
  - Page title: "Contact Enquiries"
  - No create action (read-only)
  - Clean header with no action buttons

### 10. Tests
- **Location**: `tests/Feature/ContactEnquiryResourceTest.php`
- **Test Coverage**: 16 comprehensive tests (51 assertions)
- **Tests Include**:
  - ✅ Can render contact enquiries list page
  - ✅ Can list contact enquiries
  - ✅ Can search by name, email, and phone
  - ✅ Can sort by name
  - ✅ Table is paginated
  - ✅ Can render view page
  - ✅ Can view all details
  - ✅ Can delete from list page
  - ✅ Can delete from view page
  - ✅ Can bulk delete
  - ✅ Cannot create from admin panel
  - ✅ Create page does not exist
  - ✅ Edit page does not exist
  - ✅ Table displays correct columns

## Usage

### Viewing Contact Enquiries
1. Navigate to the Filament admin panel
2. Click on "Contact Enquiries" in the sidebar
3. View all submitted contact enquiries in the table
4. Use search to find specific enquiries
5. Click on any row to view full details

### Managing Enquiries
- **View Details**: Click on any enquiry row or the "View" action
- **Delete Single**: Click the "Delete" action on any row
- **Bulk Delete**: Select multiple enquiries using checkboxes and use the bulk actions dropdown
- **Search**: Use the search bar to find enquiries by name, email, phone, or message content

### Running Tests
```bash
# Run all ContactEnquiry tests
php artisan test --filter=ContactEnquiryResourceTest

# Run specific test
php artisan test --filter="can delete contact enquiry from list page"
```

### Seeding Test Data
```bash
# Create 10 sample contact enquiries
php artisan tinker --execute="App\Models\ContactEnquiry::factory()->count(10)->create();"
```

## Best Practices Followed

### ✅ Laravel & Filament v4
- Uses Filament v4 conventions and components
- Proper namespace organization under `ContactEnquiries/`
- Schema components from `Filament\Schemas\Components`
- Actions from `Filament\Actions`

### ✅ Code Quality
- All code formatted with Laravel Pint
- PHPDoc blocks included
- Type hints on all methods
- Follows Laravel naming conventions

### ✅ Testing
- Comprehensive test coverage using Pest
- RefreshDatabase trait for isolation
- Tests cover all functionality
- All 16 tests passing

### ✅ Security
- Read-only resource prevents unauthorized data entry
- User authentication required
- Proper authorization checks via Filament

### ✅ User Experience
- Clean, intuitive interface
- Copyable email addresses
- Sortable and searchable columns
- Responsive table layout
- Clear action buttons with icons

## Technical Details

### Resource Configuration
```php
protected static ?string $model = ContactEnquiry::class;
protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;
protected static ?string $navigationLabel = 'Contact Enquiries';
public static function canCreate(): bool { return false; }
```

### Table Features
- **Pagination**: Default Laravel pagination
- **Search**: Global search across name, email, phone, and message
- **Sorting**: Clickable column headers
- **Default Sort**: Newest submissions first
- **Copyable**: Email field has one-click copy functionality

### View Page Layout
- **Section**: Single section for all fields
- **Columns**: 2-column responsive layout
- **Message Field**: Full width for better readability
- **Date Format**: "F j, Y g:i A" (e.g., "October 26, 2025 8:15 PM")

## Integration Points

### Frontend Form Integration
To integrate with a frontend contact form, submit data to your ContactEnquiry model:

```php
ContactEnquiry::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'message' => $request->message,
]);
```

### Notifications (Optional Enhancement)
Consider adding email notifications when new enquiries are submitted:
- Admin notification on new submission
- Auto-reply to customer
- Integration with notification services

## File Structure
```
app/
├── Models/
│   └── ContactEnquiry.php
├── Filament/
│   └── Resources/
│       └── ContactEnquiries/
│           ├── ContactEnquiryResource.php
│           ├── Pages/
│           │   ├── ListContactEnquiries.php
│           │   └── ViewContactEnquiry.php
│           ├── Schemas/
│           │   └── ContactEnquiryInfolist.php
│           └── Tables/
│               └── ContactEnquiriesTable.php
database/
├── migrations/
│   └── 2025_10_26_200917_create_contact_enquiries_table.php
├── factories/
│   └── ContactEnquiryFactory.php
tests/
└── Feature/
    └── ContactEnquiryResourceTest.php
```

## Summary
The Contact Enquiry Resource is a fully functional, read-only inbox system for managing contact form submissions. It provides administrators with an easy-to-use interface to view, search, and manage customer inquiries while maintaining data integrity by preventing accidental creation or modification of enquiries through the admin panel.

**Status**: ✅ Fully Implemented & Tested
**Tests**: 16/16 Passing
**Code Quality**: Formatted with Laravel Pint
**Production Ready**: Yes

