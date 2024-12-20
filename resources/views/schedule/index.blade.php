@extends('layouts/base')
@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-md font-16 btn-info btn-block" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Assign Staff</button>
                            </div> <!-- end col-->

                            <div class="col-lg-12">
                                <div class="mt-4 mt-lg-0">
                                    <div id="calendar"></div>
                                </div>
                            </div> <!-- end col -->

                        </div>  <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Assign Staff MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="assign-staff-form" action="{{ route('schedule.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF token for security -->
                                <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h5 class="modal-title" id="modal-title">Assign Staff</h5>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">

                                    <!-- Hidden input for event ID -->
                                    <input type="hidden" id="event-id" name="event_id">

                                        <div class="row">
                                            <!-- Staff Dropdown -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="event-staff">Staff Name</label>
                                                    <select class="form-control" id="event-staff" name="staff_id" required>
                                                        <option value="">Select Staff</option>
                                                        @foreach($staff as $staffMember)
                                                            @if($staffMember->role !== 'Manager')
                                                                <option value="{{ $staffMember->id }}" data-role="{{ $staffMember->role }}">
                                                                    {{ $staffMember->user->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Role (Readonly) -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="event-role">Role</label>
                                                    <input class="form-control" type="text" id="event-role" readonly />
                                                </div>
                                            </div>
                                            <!-- Category -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="event-category">Category</label>
                                                    <select class="form-control" name="category" id="event-category" required>
                                                        <option value="bg-danger">Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Date and Time -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="event-date">Date</label>
                                                    <input class="form-control" type="date" name="date" id="event-date" required />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="event-start-time">Start Time</label>
                                                    <input class="form-control" type="time" id="event-start-time" required />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="event-end-time">End Time</label>
                                                    <input class="form-control" type="time" id="event-end-time" required />
                                                </div>
                                            </div>
                                            <!-- Hidden Inputs for Combined Datetime -->
                                            <input type="hidden" name="start_time" id="hidden-start-time" />
                                            <input type="hidden" name="end_time" id="hidden-end-time" />
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal-->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Start with Month view
                // headerToolbar: {
                //     left: 'prev,next today', // Navigation buttons
                //     center: 'title', // Calendar title
                // },
                editable: false, // Prevent event dragging
                selectable: true, // Allow selection of time slots
                events: '/api/schedules', // Fetch events from the backend
                eventOverlap: true, // Allow overlapping events
                eventDisplay: 'block', // Show overlapping events in blocks
                select: function (info) {
                    openModal(info.startStr, info.endStr); // Open modal on selection
                },
                eventClick: function (info) {
                    openModal(info.event.startStr, info.event.endStr, info.event.id); // Open modal on event click
                },
                eventDidMount: function (info) {
                    // Get the category class from the event data (e.g., bg-danger)
                    const categoryClass = info.event.extendedProps.category;

                    // Add the Bootstrap category class for background color
                    if (categoryClass) {
                        info.el.classList.add(categoryClass); // Adds 'bg-danger', 'bg-success', etc.
                    }

                    // Set text color to white for visibility
                    info.el.style.color = 'white';
                    
                    // Add rounded corners
                    info.el.style.borderRadius = '5px';

                    // Set the event title to include both staff name and staff role
                    const staffName = info.event.title; // This comes from the `title` field (staff name)
                    const staffRole = info.event.extendedProps.role; // This comes from `extendedProps.role` (staff role)
                    info.el.innerHTML = `${staffName} <br> (${staffRole})`; // Display staff name and role in the event

                    // Set tooltip with staff name and role
                    info.el.title = `${staffName} (${staffRole})`; // Tooltip showing staff name and role
                },
            });

            calendar.render();

            // Open modal on "Assign Staff" button click
            document.getElementById('btn-new-event').addEventListener('click', function () {
                openModal();
            });

            // Open modal function
            function openModal(start = null, end = null, eventId = null) {
                $('#event-modal').modal('show');
                $('#event-id').val(eventId || ''); // Hidden input for event ID
                $('#event-date').val(start ? start.split('T')[0] : ''); // Pre-fill date
                $('#event-start-time').val(start ? start.split('T')[1] : '09:00');
                $('#event-end-time').val(end ? end.split('T')[1] : '18:00');
            }

            // Dynamically update role based on selected staff
            const staffDropdown = document.getElementById('event-staff');
            const roleInput = document.getElementById('event-role');

            // Update role field on staff selection
            staffDropdown.addEventListener('change', function () {
                const selectedOption = staffDropdown.options[staffDropdown.selectedIndex];
                const role = selectedOption.getAttribute('data-role'); // Get role from data-role attribute
                roleInput.value = role || ''; // Update role field or clear it
            });

            // Trigger role update when modal is shown
            $('#event-modal').on('shown.bs.modal', function () {
                staffDropdown.dispatchEvent(new Event('change')); // Trigger change event to populate role field
            });
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const saveButton = document.querySelector('#assign-staff-form button[type="submit"]');
            const startTimeInput = document.getElementById('hidden-start-time');
            const endTimeInput = document.getElementById('hidden-end-time');

            // Add event listener for the "Save" button
            saveButton.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Get date and time values from inputs
                const eventDate = document.getElementById('event-date').value; // Date: "2024-12-15"
                const startTime = document.getElementById('event-start-time').value; // Time: "09:00"
                const endTime = document.getElementById('event-end-time').value; // Time: "18:00"

                if (!eventDate || !startTime || !endTime) {
                    alert("Please fill in the date, start time, and end time."); // Basic error check
                    return;
                }

                // Combine date and time into full datetime strings
                const startDateTime = `${eventDate} ${startTime}`; // "2024-12-15 09:00"
                const endDateTime = `${eventDate} ${endTime}`; // "2024-12-15 18:00"

                // Assign the combined values to hidden inputs
                startTimeInput.value = `${eventDate} ${startTime}`;
                endTimeInput.value = `${eventDate} ${endTime}`;

                // Submit the form programmatically
                document.getElementById('assign-staff-form').submit(); // Submit the form
            });
        });

    </script>


@endsection
