@extends('admin.layout')

@section('title', 'Inbox Messages')

@section('content')
    <!-- Inbox Card -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Received Messages</h3>
            <span class="stat-label">12 Messages Total</span>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Email</th>
                            <th>Message Content</th>
                            <th>Received Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nyein Chan</strong></td>
                            <td>nyeinchan@example.com</td>
                            <td>Hi, I want to talk about a freelance Laravel project for a logistics system...</td>
                            <td>2026-07-25 15:45</td>
                            <td><span class="status-badge status-unread">Unread</span></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Mark as Read"><i class="fas fa-envelope-open"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Aung Aung</strong></td>
                            <td>aungaung@example.com</td>
                            <td>Do you have experience in Vue.js or React? I saw your portfolio and wanted to inquire about standard frontend frameworks.</td>
                            <td>2026-07-24 10:12</td>
                            <td><span class="status-badge status-read">Read</span></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Mark as Unread"><i class="fas fa-envelope"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Dr. Htein Linn</strong></td>
                            <td>hteinlinn@university.edu.mm</td>
                            <td>Your B.Sc Mathematics and BBA background is very interesting. I would like to discuss a position as a developer in our academic IT team...</td>
                            <td>2026-07-23 09:30</td>
                            <td><span class="status-badge status-read">Read</span></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Mark as Unread"><i class="fas fa-envelope"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Mya Mya</strong></td>
                            <td>myamya@company.com</td>
                            <td>Hello Lin, can you send me your updated CV/Resume pdf directly to my email? The download button was fast but I want to keep a thread.</td>
                            <td>2026-07-22 17:05</td>
                            <td><span class="status-badge status-read">Read</span></td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action btn-edit" title="Mark as Unread"><i class="fas fa-envelope"></i></button>
                                    <button class="btn-action btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
