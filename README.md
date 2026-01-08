# ThoughtNest

ThoughtNest is a role based mental health journaling application built with Laravel.  
It allows users to privately journal, therapists to provide supportive comments to assigned users, and admins to manage therapist user assignments.

The project was built as a portfolio piece to explore real world Laravel concepts such as authentication, authorisation policies, form requests, and role based access control.

---

## Features

### Users

-   Register and log in securely
-   Create, view, update, and delete private journal entries
-   View therapist comments on their journal entries
-   Access limited strictly to their own data

### Therapists

-   View only users assigned to them by an admin
-   Read assigned users’ journal entries
-   Leave and delete supportive comments on journal entries
-   Access enforced via policies and role based middleware

### Admins

-   Register therapist accounts
-   Assign therapists to users
-   Manage therapist user relationships

---

## Tech Stack

-   **Backend:** Laravel
-   **Frontend:** Blade, Alpine.js
-   **Database:** SQLite (development)
-   **Authentication:** Laravel authentication
-   **Authorization:** Policies, middleware, form request authorisation

---

## Authorization & Security

Authorisation is handled using a combination of:

-   **Role-based middleware** (user, therapist, admin)
-   **Laravel policies** for fine grained access control
-   **Form Request authorization** for create/update actions
-   **Route model binding** to ensure correct model resolution

Therapists can only access:

-   Users assigned to them
-   Journal entries belonging to those users

Users can only access:

-   Their own journal entries

Admins control all therapist user assignments.

---

## Application Structure

-   User journal entries follow standard RESTful patterns
-   Therapist routes are nested under assigned users
-   Admin workflows are separated and role protected
-   Policies are used where access depends on data relationships
-   Middleware is used where access depends on role

---

## What I Learned

This project helped solidify my understanding of:

-   Laravel policies with multiple models
-   The difference between middleware and policies
-   Form Request `validated()` vs `safe()`
-   Route model binding and nested resources
-   HTTP method correctness (e.g. POST-only logout)
-   Structuring role based applications in Laravel

---

## Future Improvements

-   User onboarding mood tracking
-   UI and accessibility improvements
-   Therapist dashboard enhancements
-   Automated tests
-   Deployment configuration

---

## Getting Started

1. Clone the repository
2. Install dependencies
3. Set up environment variables
4. Run migrations
5. Start the development server
