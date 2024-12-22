@extends('layout/pages')

@section('isi')
    <!-- form section -->
    <section id="form">
        <div class="container-sm mt-2">
            <div class="contain">
                <h1>Fill the form</h1>
            </div>
            <form id="userForm" class="needs-validation" novalidate>
                <div class="mb-2">
                    <label for="name" class="form-label">Full Name</label>
                    <input class="form-control" type="text" id="name" placeholder="Insert your name" required>
                    <div class="invalid-feedback">Minimum 2 characters!</div>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" id="email" placeholder="Enter your email">
                    <div class="invalid-feedback">Example: username@example.com</div>
                </div>

                <div class="mb-2">
                    <label for="IDCard" class="form-label">ID card number</label>
                    <input type="text" class="form-control" id="IDCard" maxlength="16" required>
                    <div class="invalid-feedback">ID card number must be 16 digits and only contain numbers!</div>
                </div>

                <div class="mb-2">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" required></textarea>
                    <div class="invalid-feedback">Minimum 10 characters!</div>
                </div>

                <div class="mb-2">
                    <label for="gender" class="form-label">Gender</label>
                    <div class="ms-3 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Men"
                            required>
                        <label class="form-check-label" for="inlineRadio1">Men</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Women"
                            required>
                        <label class="form-check-label" for="inlineRadio2">Women</label>
                    </div>
                    <div class="invalid-feedback">Choose gender!</div>
                </div>

                <div class="mb-2">
                    <label for="artist" class="form-label">Artist</label>
                    <select class="form-select" id="artist" required>
                        <option value="" selected>Select your artist</option>
                        <option value="Lany">Lany</option>
                        <option value="Niki">Niki</option>
                        <option value="The 1975">The 1975</option>
                        <option value="Ari">Ariana Grande</option>
                    </select>
                    <div class="invalid-feedback">Choose an artist!</div>
                </div>


                <div class="mb-2">
                    <label for="ticket" class="form-label">Ticket</label>
                    <select class="form-select" id="ticket" required>
                        <option value="" selected>Select your ticket</option>
                        <option value="VVIP" data-price="3000000">VVIP (Rp 3,000,000)</option>
                        <option value="VIP" data-price="2000000">VIP (Rp 2,000,000)</option>
                        <option value="Regular" data-price="1000000">Regular (Rp 1,000,000)</option>
                    </select>
                    <div class="invalid-feedback">Choose a ticket!</div>
                </div>

                <div class="mb-2">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" min="1" value="1" required>
                    <div class="invalid-feedback">Please enter a valid quantity!</div>
                </div>

                <div class="mb-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Order Receipt</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Full Name:</strong> <span id="modalName"></span></p>
                            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                            <p><strong>ID Card:</strong> <span id="modalIDCard"></span></p>
                            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
                            <p><strong>Gender:</strong> <span id="modalGender"></span></p>
                            <p><strong>Ticket:</strong> <span id="modalTicket"></span></p>
                            <p><strong>Artist:</strong> <span id="modalArtist"></span></p>
                            <p><strong>Price per Ticket:</strong> Rp <span id="modalPrice"></span></p>
                            <p><strong>Quantity:</strong> <span id="modalQuantity"></span></p>
                            <p><strong>Total Price:</strong> Rp <span id="modalTotal"></span></p>
                            <p><strong>Date:</strong> <span id="modalDate"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
