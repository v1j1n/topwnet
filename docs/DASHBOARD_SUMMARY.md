# Custom Filament Dashboard - Complete Documentation

## Overview
A comprehensive Filament v4 dashboard with real-time statistics, recent enquiries display, and interactive quick-view modals.

## Dashboard Layout

### 🔷 Top Row - Stats Overview (4 Cards)

#### 1. Total Enquiries Card
- **Metric**: Count of all general enquiries from services
- **Trend Indicator**: Week-over-week percentage change
- **Chart**: 7-day sparkline showing daily enquiry counts
- **Color**: Success (green)
- **Icon**: Trending Up Arrow

#### 2. Contact Enquiries Card
- **Metric**: Count of all contact form submissions
- **Trend Indicator**: Week-over-week percentage change
- **Chart**: 7-day sparkline showing daily submissions
- **Color**: Info (blue)
- **Icon**: Envelope

#### 3. Active Services Card
- **Metric**: Count of published/active services
- **Description**: "Published services"
- **Color**: Warning (amber)
- **Icon**: Check Circle

#### 4. Active Partners Card
- **Metric**: Count of published/active partners
- **Description**: "Published partners"
- **Color**: Primary (purple)
- **Icon**: User Group

### 🔶 Middle Section - Recent Enquiries Tables

#### Recent General Enquiries Widget
- **Heading**: "Recent General Enquiries"
- **Records**: Latest 5 general enquiries
- **Columns**:
  - Name (searchable, medium weight)
  - Service (badge, info color)
  - Email (searchable, copyable, envelope icon)
  - Submitted (relative time, e.g., "2 hours ago")
- **Actions**: 
  - Eye icon → Opens modal with full enquiry details
  - Modal includes: Name, Email, Phone, Service, Message, Submission date
- **Width**: Full width
- **Sort Order**: 2

#### Recent Contact Enquiries Widget
- **Heading**: "Recent Contact Enquiries"
- **Records**: Latest 5 contact form submissions
- **Columns**:
  - Name (searchable, medium weight)
  - Email (searchable, copyable, envelope icon)
  - Phone (phone icon)
  - Submitted (relative time)
- **Actions**: 
  - Eye icon → Opens modal with full contact details
  - Modal includes: Name, Email, Phone, Message, Submission date
- **Width**: Full width
- **Sort Order**: 3

## Files Created

### 1. Stats Overview Widget
- **Location**: `app/Filament/Widgets/StatsOverview.php`
- **Type**: StatsOverviewWidget
- **Features**:
  - Real-time counts from database
  - Automatic trend calculation (week-over-week)
  - 7-day sparkline charts
  - Color-coded cards with icons
  - Responsive layout

**Key Methods**:
```php
getStats()                    // Returns array of 4 Stat cards
getEnquiryTrend()            // Calculates % change for enquiries
getContactEnquiryTrend()     // Calculates % change for contact enquiries
getEnquiryChartData()        // Returns 7-day data for sparkline
getContactEnquiryChartData() // Returns 7-day data for sparkline
```

### 2. Recent Enquiries Widget
- **Location**: `app/Filament/Widgets/RecentEnquiries.php`
- **Type**: TableWidget
- **Features**:
  - Displays latest 5 general enquiries
  - Quick view modal with full details
  - Searchable columns
  - Copyable email addresses
  - Relative timestamps
  - No pagination (shows exactly 5)

### 3. Recent Contact Enquiries Widget
- **Location**: `app/Filament/Widgets/RecentContactEnquiries.php`
- **Type**: TableWidget
- **Features**:
  - Displays latest 5 contact form submissions
  - Quick view modal with full details
  - Searchable columns
  - Copyable email addresses
  - Phone numbers with icon
  - Relative timestamps
  - No pagination (shows exactly 5)

### 4. Modal View Templates
**Enquiry Details Modal**
- **Location**: `resources/views/filament/widgets/enquiry-details.blade.php`
- **Layout**: 
  - 2-column grid for Name, Email
  - 2-column grid for Phone, Service (with badge)
  - Full-width Message box (gray background)
  - Full-width Submission date
- **Styling**: Dark mode compatible

**Contact Enquiry Details Modal**
- **Location**: `resources/views/filament/widgets/contact-enquiry-details.blade.php`
- **Layout**:
  - 2-column grid for Name, Email
  - Single column for Phone
  - Full-width Message box (gray background)
  - Full-width Submission date
- **Styling**: Dark mode compatible

## Dashboard Structure

```
┌─────────────────────────────────────────────────────────────────┐
│  📊 Stats Overview (Top Row)                                    │
├──────────────┬──────────────┬──────────────┬──────────────────┤
│ Total        │ Contact      │ Active       │ Active           │
│ Enquiries    │ Enquiries    │ Services     │ Partners         │
│ 150          │ 85           │ 12           │ 24               │
│ +25% ↗       │ +15% 📧      │ Published ✓  │ Published 👥     │
│ [sparkline]  │ [sparkline]  │              │                  │
└──────────────┴──────────────┴──────────────┴──────────────────┘

┌─────────────────────────────────────────────────────────────────┐
│  📋 Recent General Enquiries                                    │
├──────────────┬──────────────┬──────────────┬──────────────────┤
│ Name         │ Service      │ Email        │ Submitted │ Act. │
│ John Doe     │ [Web Dev]    │ john@...     │ 2h ago    │ 👁   │
│ Jane Smith   │ [Design]     │ jane@...     │ 5h ago    │ 👁   │
│ ...          │ ...          │ ...          │ ...       │ ...  │
└──────────────┴──────────────┴──────────────┴──────────────────┘

┌─────────────────────────────────────────────────────────────────┐
│  📋 Recent Contact Enquiries                                    │
├──────────────┬──────────────┬──────────────┬──────────────────┤
│ Name         │ Email        │ Phone        │ Submitted │ Act. │
│ Alice Brown  │ alice@...    │ +1-555...    │ 1h ago    │ 👁   │
│ Bob Wilson   │ bob@...      │ +1-555...    │ 3h ago    │ 👁   │
│ ...          │ ...          │ ...          │ ...       │ ...  │
└──────────────┴──────────────┴──────────────┴──────────────────┘
```

## Features & Benefits

### ✅ Real-Time Data
- All metrics pulled directly from database
- No caching - always current
- Automatic updates on page refresh

### ✅ Trend Indicators
- Week-over-week comparison
- Automatic percentage calculation
- Positive/negative indicators
- Handles edge cases (division by zero)

### ✅ Visual Analytics
- 7-day sparkline charts for quick trends
- Color-coded cards for easy scanning
- Icons for visual hierarchy

### ✅ Interactive Tables
- Latest 5 records displayed
- Quick view modals for details
- No need to navigate away
- Copyable email addresses

### ✅ Responsive Design
- Mobile-friendly layout
- Adaptive grid system
- Dark mode compatible
- Follows Filament v4 design system

### ✅ Performance Optimized
- Limited queries (5 records per widget)
- No pagination overhead
- Efficient chart data generation
- Optimized trend calculations

## Widget Sort Order

1. **Sort 1**: StatsOverview (default - appears first)
2. **Sort 2**: RecentEnquiries
3. **Sort 3**: RecentContactEnquiries

## Customization Options

### Adjust Number of Records
Change `limit(5)` in the widget files:
```php
// RecentEnquiries.php or RecentContactEnquiries.php
->query(
    Enquiry::query()->latest()->limit(10) // Show 10 instead of 5
)
```

### Change Colors
Modify the `->color()` method in StatsOverview.php:
```php
->color('success')  // Options: success, danger, warning, info, primary, gray
```

### Modify Trend Period
Change the date range in trend calculation methods:
```php
$lastWeek = Enquiry::where('created_at', '>=', now()->subMonth())->count();
```

### Add More Stats Cards
Add additional Stat::make() calls in the getStats() array:
```php
Stat::make('Total Users', User::count())
    ->description('Registered users')
    ->descriptionIcon('heroicon-o-users')
    ->color('info'),
```

### Customize Modal Content
Edit the Blade template files:
- `resources/views/filament/widgets/enquiry-details.blade.php`
- `resources/views/filament/widgets/contact-enquiry-details.blade.php`

## Technical Details

### Database Queries
- **StatsOverview**: 8 queries (4 counts + 4 trend/chart calculations)
- **RecentEnquiries**: 1 query (latest 5)
- **RecentContactEnquiries**: 1 query (latest 5)
- **Total**: 10 queries per dashboard load

### Widget Lifecycle
1. Filament loads dashboard
2. Widgets sorted by `$sort` property
3. Each widget queries database
4. Data rendered with Livewire
5. Modals loaded on-demand (lazy loading)

### Caching Recommendations
For high-traffic dashboards, consider caching:
```php
protected static ?string $pollingInterval = '30s'; // Auto-refresh every 30 seconds
```

## Troubleshooting

### Widgets Not Showing
```bash
php artisan filament:cache-components
php artisan optimize:clear
```

### Incorrect Data
- Check model fillable fields
- Verify database connections
- Check status field values (true/false)

### Modal Not Opening
- Ensure Blade templates exist in `resources/views/filament/widgets/`
- Check view names match in widget files
- Clear view cache: `php artisan view:clear`

## Best Practices Followed

✅ **Filament v4 Conventions** - Uses latest widget types and methods
✅ **Laravel Best Practices** - Proper Eloquent usage, no raw queries
✅ **Code Quality** - Formatted with Laravel Pint
✅ **Performance** - Limited queries, efficient data loading
✅ **Accessibility** - Proper labels, icons, and semantic HTML
✅ **Dark Mode** - Full support for light/dark themes
✅ **Responsive** - Mobile-first design approach

## Summary

**Status**: ✅ Fully Implemented & Production Ready
**Files Created**: 5 (3 widgets + 2 Blade templates)
**Dashboard Sections**: 3 (Stats Overview, Recent Enquiries, Recent Contact Enquiries)
**Total Metrics**: 4 stat cards
**Total Tables**: 2 recent activity tables
**Interactive Elements**: Quick-view modals with full details

The dashboard provides a comprehensive overview of your application's key metrics and recent activity, with an intuitive interface for administrators to monitor and interact with enquiries efficiently.

