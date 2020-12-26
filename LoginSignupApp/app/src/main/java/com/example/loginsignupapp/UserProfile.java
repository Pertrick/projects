package com.example.loginsignupapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputLayout;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;
import com.squareup.picasso.Picasso;

import java.io.IOException;

public class UserProfile extends AppCompatActivity {

    private ImageView profile_picture;
    private TextInputLayout fullName, username, email, phoneNo, password;
    private TextView fullNameLabel, usernameLabel;
    private Button logout_button, update_button;

    private FirebaseDatabase firebaseDatabase;
    private FirebaseAuth firebaseAuth;
    private FirebaseUser firebaseUser;
    private FirebaseStorage firebaseStorage;
    private  static int PICK_iMAGE = 123;
    private  StorageReference storageReference;
    Uri imagePath;


    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data){

        if(requestCode == PICK_iMAGE && resultCode == RESULT_OK && data.getData() !=null){
            imagePath = data.getData();
            try {
                Bitmap bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(),imagePath);
                profile_picture.setImageBitmap(bitmap);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        super.onActivityResult(requestCode, resultCode, data);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_user_profile);


        //Hooks
        fullName = findViewById(R.id.fullname_profile);
        username = findViewById(R.id.username_profile);
        email = findViewById(R.id.email_profile);
        phoneNo = findViewById(R.id.phoneNo_profile);
        password = findViewById(R.id.password_profile);
        profile_picture = findViewById(R.id.profile_image);

        fullNameLabel = findViewById(R.id.profile_fullname);

        usernameLabel = findViewById(R.id.username);
        logout_button = findViewById(R.id.btn_Logout);
        update_button = findViewById(R.id.btn_update);

        firebaseAuth = FirebaseAuth.getInstance();
        firebaseDatabase = FirebaseDatabase.getInstance();
        firebaseStorage = FirebaseStorage.getInstance();
        storageReference =firebaseStorage.getReference();
        storageReference.child(firebaseAuth.getUid()).child("Images/profile Picture").getDownloadUrl().addOnSuccessListener(new OnSuccessListener<Uri>() {
            @Override
            public void onSuccess(Uri uri) {
                Picasso.get().load(uri).fit().centerCrop().into(profile_picture);
                profile_picture.setImageURI(uri);

            }
        });


        profile_picture.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent();
                intent.setType("image/*"); //application/* audio/*
                intent.setAction(Intent.ACTION_GET_CONTENT);
                startActivityForResult(Intent.createChooser(intent, "Select image"), PICK_iMAGE);
            }
        });




        final DatabaseReference databaseReference = firebaseDatabase.getReference(firebaseAuth.getUid());

        databaseReference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                UserHelperClass userHelperClass = snapshot.getValue(UserHelperClass.class);

                System.out.println("firebase uid= " + firebaseAuth.getUid());
                System.out.println("fullnameL: " + userHelperClass.getName());


                fullNameLabel.setText(userHelperClass.getName());

                usernameLabel.setText(userHelperClass.getUsername());
                fullName.getEditText().setText(userHelperClass.getName());
                username.getEditText().setText(userHelperClass.getUsername());
                email.getEditText().setText(userHelperClass.getEmail());
                phoneNo.getEditText().setText(userHelperClass.getPhoneNo());
                password.getEditText().setText(userHelperClass.getPassword());

            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {

                Toast.makeText(UserProfile.this, error.getCode(), Toast.LENGTH_SHORT).show();
            }
        });

        logout_button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Logout();
            }
        });

        update_button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name =  fullName.getEditText().getText().toString();
                String userName = username.getEditText().getText().toString();
                String e_mail  = email.getEditText().getText().toString();
                String phone_No = phoneNo.getEditText().getText().toString();
                String pass_word = password.getEditText().getText().toString();

                UserHelperClass helperClass = new UserHelperClass(name,userName,e_mail,phone_No,pass_word);

                databaseReference.setValue(helperClass);

                firebaseUser = FirebaseAuth.getInstance().getCurrentUser();


                String pass = password.getEditText().getText().toString();

                firebaseUser.updatePassword(pass).addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task) {

                        if(task.isSuccessful()){
                            Toast.makeText(UserProfile.this, "Password changed!", Toast.LENGTH_SHORT).show();
                            finish();
                        }

                        else{
                            Toast.makeText(UserProfile.this, "Password update failed", Toast.LENGTH_SHORT).show();

                        }


                    }
                });



                firebaseUser.updateEmail(e_mail).addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task) {
                        if(task.isSuccessful()){
                            finish();
                        }

                        else{
                            Toast.makeText(UserProfile.this, "Email update faild", Toast.LENGTH_SHORT);
                            finish();
                        }


                    }
                });


                StorageReference imageReference = storageReference.child(firebaseAuth.getUid()).child("Images").child("profile Picture"); //user id/ Images/ Profile Picture

                UploadTask uploadTask = imageReference.putFile(imagePath);
                uploadTask.addOnFailureListener(new OnFailureListener() {
                    @Override
                    public void onFailure(@NonNull Exception e) {

                        Toast.makeText(UserProfile.this, "Image upload failed", Toast.LENGTH_SHORT);
                    }
                }).addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
                    @Override
                    public void onSuccess(UploadTask.TaskSnapshot taskSnapshot) {

                        Toast.makeText(UserProfile.this, "Image upload successful", Toast.LENGTH_SHORT);

                    }
                });



                finish();
            }
        });


        //show Alldata
        showAllUserData();

    }


        private void Logout() {
            firebaseAuth.signOut();
            finish();
            startActivity(new Intent(UserProfile.this, Login.class));


        }



    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.menu, menu);
        return true;

    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){

        switch (item.getItemId()) {
            case R.id.logoutMenu: {
                Logout();
            }
        }
            return super.onOptionsItemSelected(item);
    }

    private void showAllUserData(){
        Intent intent = getIntent();
        String user_username = intent.getStringExtra("username");
        String user_name = intent.getStringExtra("name");
        String user_email = intent.getStringExtra("email");
        String user_phoneNo = intent.getStringExtra("phoneNo");
        String user_password = intent.getStringExtra("password");

    }


}