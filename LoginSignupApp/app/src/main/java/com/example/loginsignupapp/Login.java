package com.example.loginsignupapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ActivityOptions;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Pair;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputEditText;
import com.google.android.material.textfield.TextInputLayout;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

public class Login extends AppCompatActivity {

    Button callSignUp, login_btn, forget_password;
    ImageView image;
    TextView logoText, sloganText;
    TextInputLayout email, password;

    private FirebaseAuth firebaseAuth;
    private ProgressDialog progressDialog;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_login);

        //Hooks
        callSignUp = findViewById(R.id.signUp);
        image =findViewById(R.id.logo_image);
        logoText = findViewById(R.id.logo_name);
        sloganText = findViewById(R.id.slogan_name);
        email = findViewById(R.id.login_Email);
        password = findViewById(R.id.password);
        login_btn = findViewById(R.id.login_btn);

        forget_password = findViewById(R.id.forget_password);


        firebaseAuth = FirebaseAuth.getInstance();
        progressDialog = new ProgressDialog(this);

        final FirebaseUser user = firebaseAuth.getCurrentUser();

        if(user != null){
            finish();
            startActivity(new Intent(Login.this, UserProfile.class ));

        }

        login_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (Authenticate()) {
                    validate(email.getEditText().getText().toString(), password.getEditText().getText().toString());
                } else {
                    Toast.makeText(Login.this, "Login Failed! Enter Valid details", Toast.LENGTH_SHORT).show();
                }
            }
        });

        callSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Login.this, Sign_Up.class);

                Pair[] pairs = new Pair[7];
                pairs[0] = new Pair<View, String>(image, "logo_image");
                pairs[1] = new Pair<View, String>(logoText, "logo_text");
                pairs[2] = new Pair<View, String>(sloganText, "logo_description");
                pairs[3] = new Pair<View, String>(email, "username_tran");
                pairs[4] = new Pair<View, String>(password, "password_tran");
                pairs[5] = new Pair<View, String>(login_btn, "button_tran");
                pairs[6] = new Pair<View, String>(callSignUp, "logo_signup_tran");


                if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.LOLLIPOP) {
                    ActivityOptions options=  ActivityOptions.makeSceneTransitionAnimation(Login.this, pairs);

                    startActivity(intent, options.toBundle());
                }


            }
        });


        forget_password.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Login.this, Recover_Password.class));
            }
        });




    }

    private Boolean Authenticate() {
        Boolean result = false;

        String AuthEmail = email.getEditText().getText().toString();
        String AuthPassword = password.getEditText().getText().toString();


            if( AuthEmail.isEmpty()  && AuthPassword.isEmpty()||((AuthEmail.isEmpty() || AuthPassword.isEmpty()))) {

                Toast.makeText(this, "Please Enter Valid details correctly", Toast.LENGTH_SHORT).show();
            }
            else {
                result =true;
            }

            return result;
        }




    /*

    private Boolean validateUsername(){
        String val = username.getEditText().getText().toString();

        if(val.isEmpty()){
            username.setError("Field cannot be empty");
            return false;
        }else {
            username.setError(null);
            username.setErrorEnabled(false);
            return true;
        }

    }

    /*

    private Boolean validatePassword(){
        String val = password.getEditText().getText().toString();

        if(val.isEmpty()) {
            password.setError("Field cannot be empty");
            return false;
        }

        else{
            password.setError(null);
            password.setErrorEnabled(false);
            return true;
        }

    }

    public void loginUser (View view){
        //validate login info
        if(!validateUsername() | !validatePassword()){
            return;
        }

        else{
            isUser();
        }
    }





    private  void isUser(){
        final String userEnteredUsername = username.getEditText().getText().toString().trim();
        final String userEnteredPassword = password.getEditText().getText().toString().trim();

        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("users");
        Query checkUser = reference.orderByChild("username").equalTo(userEnteredUsername);

        checkUser.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                if (dataSnapshot.exists()) {

                    username.setError(null);
                    username.setErrorEnabled(false);


                  //  UserHelperClass user = dataSnapshot.getValue(UserHelperClass.class);
                    String passwordFromDB = dataSnapshot.child(userEnteredUsername).child("password").getValue(String.class);
                    System.out.println("username = " + userEnteredUsername + "\n password = " +userEnteredPassword);

                    if (passwordFromDB.equals(userEnteredPassword)) {

                        username.setError(null);
                        username.setErrorEnabled(false);

                        String nameFromDB = dataSnapshot.child(userEnteredUsername).child("name").getValue(String.class);
                        String usernameFromDB = dataSnapshot.child(userEnteredUsername).child("username").getValue(String.class);
                        String phoneNoFromDB = dataSnapshot.child(userEnteredUsername).child("phoneNo").getValue(String.class);
                        String emailFromDB = dataSnapshot.child(userEnteredUsername).child("email").getValue(String.class);

                        Intent intent =  new Intent(getApplicationContext(), UserProfile.class);

                        intent.putExtra("name", nameFromDB);
                        intent.putExtra("username", usernameFromDB);
                        intent.putExtra("email", emailFromDB);
                        intent.putExtra("phoneNo", phoneNoFromDB);
                        intent.putExtra("password", passwordFromDB);

                        startActivity(intent);

                       Toast.makeText(Login.this, "Login Successful", Toast.LENGTH_SHORT).show();


                    }

                    else{

                        password.setError("Wrong Password");
                        password.requestFocus();
                    }

                }

                else{
                    username.setError("No such User Exit");
                    username.requestFocus();
                }
            }


            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }



     */


    private void validate(String userEmail, String userPassword){

        progressDialog.setMessage("Logging in!");
        progressDialog.show();
        firebaseAuth.signInWithEmailAndPassword(userEmail,userPassword).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {

                if (task.isSuccessful()){
                    progressDialog.dismiss();

                    checkEmailVerification();
                }


                else{
                    Toast.makeText(Login.this, "Login Failed", Toast.LENGTH_SHORT).show();
                    progressDialog.dismiss();
                }
            }
        });
    }

    private void checkEmailVerification(){
        FirebaseUser firebaseUser = firebaseAuth.getInstance().getCurrentUser();
        Boolean emailFlag = firebaseUser.isEmailVerified();

        if(emailFlag){
            finish();
            Toast.makeText(Login.this, "Login successful!", Toast.LENGTH_SHORT).show();
            startActivity(new Intent(Login.this, UserProfile.class));

        }

        else {
            Toast.makeText(this, "verify your email", Toast.LENGTH_SHORT).show();
            firebaseAuth.signOut();
        }

    }
}