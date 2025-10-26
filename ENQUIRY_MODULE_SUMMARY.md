# Enquiry Resource Module - Complete Documentation

## Overview
A complete **read-only** Enquiry management system for viewing and managing website enquiries submitted by users. This is designed as an inbox for viewing user-submitted data with no create or edit functionality.

## Features Implemented

### ✅ Core Functionality
- **Paginated Table** - View all enquiries in a clean, organized table
- **Individual Delete** - Delete single enquiries with confirmation
- **Bulk Delete** - Select and delete multiple enquiries at once
- **View Details Page** - Detailed view of each enquiry
- **Search & Sort** - Search by name, email, phone, service, or message
- **Read-Only** - No create or edit functionality (inbox-style)

### ✅ Navigation
- Menu item: **"Enquiries"**
- Icon: Envelope icon
- Navigation sort: 6

## Database Schema

### Table: `enquiries`

| Field | Type | Required | Notes |
|-------|------|----------|-------|
| id | bigint | ✅ | Primary key |
| name | string | ✅ | Enquirer's name |
| email | string | ✅ | Email address |
| phone | string | ❌ | Phone number (optional) |
| service_name | string | ❌ | Service interested in (optional) |
| message | text | ✅ | Enquiry message |
| created_at | timestamp | ✅ | Submission date/time |
| updated_at | timestamp | ✅ | Last updated |

## Created Files

### 1. Model
- **Location**: `app/Models/Enquiry.php`
- **Features**:
  - Fillable fields: name, email, phone, service_name, message
  - Clean, simple model structure

### 2. Migration
- **Location**: `database/migrations/2025_10_26_195257_create_enquiries_table.php`
- **Fields**: All enquiry fields with proper types and constraints

### 3. Factory
- **Location**: `database/factories/EnquiryFactory.php`
- **Generates**: Realistic enquiry data with various services for testing

### 4. Seeder
- **Location**: `database/seeders/EnquirySeeder.php`
- **Contains**: 15 sample enquiries (7 hand-crafted + 8 from factory)
- **Usage**: `php artisan db:seed --class=EnquirySeeder`

### 5. Filament Resource
- **Location**: `app/Filament/Resources/Enquiries/EnquiryResource.php`
- **Configuration**:
  - Navigation label: "Enquiries"
  - Icon: Envelope (OutlinedEnvelope)
  - Navigation sort: 6
  - **Read-only**: `canCreate()` returns `false`
  - Pages: List and View only (no Create/Edit)

### 6. Table Schema
- **Location**: `app/Filament/Resources/Enquiries/Tables/EnquiriesTable.php`
- **Columns**:
  - Name (searchable, sortable)
  - Email (searchable, sortable, copyable)
  - Phone (searchable, toggleable)
  - Service (searchable, sortable, badge display, toggleable)
  - Message (searchable, limited to 50 chars, toggleable)
  - Submitted At (date/time, sortable, toggleable)
- **Features**:
  - Default sort: created_at descending (newest first)
  - Row actions: View, Delete
  - Bulk actions: Delete multiple

### 7. View Page
- **Location**: `app/Filament/Resources/Enquiries/Pages/ViewEnquiry.php`
- **Features**:
  - Detailed view of single enquiry
  - Section layout with all fields
  - Delete action in header
  - Read-only display using Placeholder components

### 8. List Page
- **Location**: `app/Filament/Resources/Enquiries/Pages/ListEnquiries.php`
- **Auto-generated** by Filament

### 9. Tests
- **Location**: `tests/Feature/Feature/Enquiries/EnquiryResourceTest.php`
- **Test Coverage**: 15 comprehensive tests including:
  - CRUD operations
  - Field validation (required fields)
  - Optional field handling
  - Delete functionality
  - List and search functionality
  - Ordering by date
  - Resource configuration
  - Factory validation
  - Search by name, email
  - Filter by service

## Table View

### Columns Displayed:
1. **Name** - User's full name
2. **Email** - Email address (copyable)
3. **Phone** - Phone number (toggleable)
4. **Service** - Service interested in (badge format, toggleable)
5. **Message** - Preview of message (50 chars max, toggleable)
6. **Submitted At** - Date and time of submission (toggleable)

### Actions Available:
- **View** (👁️) - Opens detailed view page
- **Delete** (🗑️) - Deletes individual enquiry with confirmation
- **Bulk Delete** - Select multiple and delete at once

### Default Behavior:
- Sorted by **newest first** (created_at descending)
- All columns searchable where relevant
- Pagination enabled

## View Details Page

### Layout:
**Section: "Enquiry Details"**
- Name
- Email
- Phone Number (shows "N/A" if not provided)
- Service Interested In (shows "N/A" if not provided)
- Message (full text, spans full width)
- Submitted At (formatted: "Month Day, Year Time AM/PM")

### Actions:
- **Delete** button in header (with confirmation)

## Usage Guide

### Accessing Enquiries
1. Login to Filament Admin Panel
2. Click **"Enquiries"** in the sidebar navigation
3. View list of all enquiries (newest first)

### Viewing an Enquiry
1. Click the **"View"** action (👁️ icon) on any row
2. See full details of the enquiry
3. Optionally delete from the view page

### Deleting Enquiries

**Single Delete:**
1. Click the **"Delete"** action (🗑️ icon) on any row
2. Confirm deletion
3. Enquiry is permanently removed

**Bulk Delete:**
1. Check the checkboxes for multiple enquiries
2. Click the "Delete" bulk action
3. Confirm deletion
4. All selected enquiries are removed

### Searching & Filtering
- Use the search box to find enquiries by:
  - Name
  - Email
  - Phone
  - Service name
  - Message content
- Click column headers to sort
- Toggle column visibility using the column toggle button

### Seeding Sample Data
```bash
php artisan db:seed --class=EnquirySeeder
```

This creates 15 sample enquiries with:
- 7 realistic, hand-crafted enquiries with different services
- 8 additional enquiries from the factory
- Varied submission dates

## Test Results
✅ **All 15 tests passing** with 26 assertions

Run tests with:
```bash
php artisan test --filter=EnquiryResourceTest
```

### Tests Cover:
- ✅ Creating enquiries with all fields
- ✅ Required field validation (name, email, message)
- ✅ Optional field handling (phone, service_name)
- ✅ Delete functionality
- ✅ List multiple enquiries
- ✅ Default ordering (created_at desc)
- ✅ Resource navigation labels
- ✅ Read-only configuration (canCreate = false)
- ✅ Factory validation
- ✅ Search by name
- ✅ Search by email
- ✅ Filter by service name

## Frontend Integration

### Create a Contact Form

Example form that submits to create an enquiry:

```php
// In your controller
use App\Models\Enquiry;

public function submitEnquiry(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:255',
        'service_name' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    Enquiry::create($validated);

    return redirect()->back()->with('success', 'Thank you for your enquiry!');
}
```

### Example Blade Form

```blade
<form action="{{ route('enquiry.submit') }}" method="POST">
    @csrf
    
    <div>
        <label for="name">Name *</label>
        <input type="text" name="name" required>
    </div>
    
    <div>
        <label for="email">Email *</label>
        <input type="email" name="email" required>
    </div>
    
    <div>
        <label for="phone">Phone</label>
        <input type="tel" name="phone">
    </div>
    
    <div>
        <label for="service_name">Service Interested In</label>
        <select name="service_name">
            <option value="">-- Select Service --</option>
            <option value="Web Development">Web Development</option>
            <option value="Mobile App Development">Mobile App Development</option>
            <option value="Digital Marketing">Digital Marketing</option>
            <option value="UI/UX Design">UI/UX Design</option>
            <option value="Consulting Services">Consulting Services</option>
        </select>
    </div>
    
    <div>
        <label for="message">Message *</label>
        <textarea name="message" rows="5" required></textarea>
    </div>
    
    <button type="submit">Send Enquiry</button>
</form>
```

## Best Practices

### ✅ Read-Only Design
- No create button in the admin interface
- No edit functionality
- Users can only view and delete
- Perfect for inbox-style data management

### ✅ Data Integrity
- Required fields enforced at database level
- Optional fields allow flexibility
- Timestamps track submission time

### ✅ User Experience
- Default sort shows newest enquiries first
- Email is copyable for easy contact
- Service name displayed as badge for visual clarity
- Message preview in table (50 chars) with full view on detail page
- Clear action buttons (View, Delete)

### ✅ Performance
- Pagination enabled for large datasets
- Searchable columns indexed where needed
- Efficient queries with proper sorting

## Key Features Summary

| Feature | Status |
|---------|--------|
| Paginated table | ✅ |
| Name field | ✅ |
| Email field | ✅ |
| Phone field | ✅ |
| Service name field | ✅ |
| Message field | ✅ |
| Individual delete | ✅ |
| Bulk delete | ✅ |
| View details page | ✅ |
| Sidebar menu "Enquiries" | ✅ |
| No create functionality | ✅ |
| No edit functionality | ✅ |
| Read-only inbox | ✅ |
| Search & filter | ✅ |
| Sort by date | ✅ |
| Copyable email | ✅ |
| Comprehensive tests | ✅ |

## Notes
- All code formatted with Laravel Pint ✅
- Follows Laravel 12 and Filament 4 conventions ✅
- Enterprise-ready structure ✅
- Comprehensive test coverage (15 tests, 26 assertions) ✅
- Read-only design prevents accidental data entry ✅
- Perfect for managing user-submitted enquiries ✅

## File Structure

```
app/
├── Models/
│   └── Enquiry.php
└── Filament/
    └── Resources/
        └── Enquiries/
            ├── EnquiryResource.php
            ├── Pages/
            │   ├── ListEnquiries.php
            │   └── ViewEnquiry.php
            └── Tables/
                └── EnquiriesTable.php

database/
├── factories/
│   └── EnquiryFactory.php
├── migrations/
│   └── 2025_10_26_195257_create_enquiries_table.php
└── seeders/
    └── EnquirySeeder.php

tests/
└── Feature/
    └── Feature/
        └── Enquiries/
            └── EnquiryResourceTest.php
```

The Enquiry Resource is now **fully functional** and ready to manage website enquiries! 🎉

