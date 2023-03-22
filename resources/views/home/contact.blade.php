<!DOCTYPE html>


<div class="contact-section">

    <div class="contact-info">

       


            <div><i class="fas fa-map-marker-alt"></i>Address,City,Bangladesh</div>
            <div><i class="fas fa-envelope"></i>mahbubur@gmail.com</div>
            <div><i class="fas fa-phone"></i>+000 1609-558069</div>
            <div><i class="fas fa-clock"></i> Mon-Fri 8:00 AM to 5:00 PM</div>
     
    </div>
    
            <div class="contact-form">

                <h2>Contact Us</h2>
                <form action="{{url('contact')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" class="text-box" placeholder="Enter Your name" required>
                    <input type="email" name="email" class="text-box" placeholder="Enter Your email" required>
                    <textarea name="message" id="" cols="30" rows="5" placeholder="Youre Message"></textarea>
                    <input type="submit" name="submit" class="submit" value="send">
                </form>
            </div>
        
    
</div>