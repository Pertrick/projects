package com.example.loginsignupapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.textfield.TextInputLayout;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class Sign_Up extends AppCompatActivity {

    //variables
    private TextInputLayout regName, regUsername, regEmail, regPhoneNo, regPassword;
    private Button regBtn, regToLoginBtn;
    private FirebaseAuth firebaseAuth;
    private ProgressDialog progressDialog;

    private String name, username, email, phoneNo, password;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);
        setContentView(R.layout.activity_sign__up);
        setupViews();

        firebaseAuth = FirebaseAuth.getInstance();
        progressDialog = new ProgressDialog(this);

        regBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(validate()){
                    //upload data to the database
                    String user_email = regEmail.getEditText().getText().toString().trim();
                    String user_password = regPassword.getEditText().getText().toString().trim();

                    progressDialog.setMessage("Signing up!");
                    progressDialog.show();
                    firebaseAuth.createUserWithEmailAndPassword(user_email, user_password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {
                            if(task.isSuccessful()){


                                sendEmailVerification();
                                sendUserData();


                                firebaseAuth.signOut();
                                Toast.makeText(Sign_Up.this, "Registration successful!", Toast.LENGTH_LONG).show();
                                finish();
                                startActivity(new Intent(Sign_Up.this, Login.class));


                                progressDialog.dismiss();

                                finish();

                            }
                            else{
                                Toast.makeText(Sign_Up.this, "Registration Failed!", Toast.LENGTH_SHORT).show();
                                progressDialog.dismiss();

                            }
                        }
                    });


                }
            }
        });

        regToLoginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Sign_Up.this, Login.class));
            }
        });
    }

   /* @Override
    public void onStart() {
        super.onStart();
        // Check if user is signed in (non-null) and update UI accordingly.
        FirebaseUser currentUser = firebaseAuth.getCurrentUser();
        updateUI(currentUser);
    }

    */

    private void setupViews(){

        regName = findViewById(R.id.reg_name);
        regUsername = findViewById(R.id.reg_username);
        regEmail = findViewById(R.id.reg_email);
        regPhoneNo = findViewById(R.id.reg_phoneNo);
        regPassword = findViewById(R.id.reg_password);
        regBtn = findViewById(R.id.reg_btn);
        regToLoginBtn = findViewById(R.id.reg_login_btn);

    }

    private Boolean validate() {
        Boolean result = false;

        name = regName.getEditText().getText().toString();
        username = regUsername.getEditText().getText().toString();
        email = regEmail.getEditText().getText().toString();
        phoneNo = regPhoneNo.getEditText().getText().toString();
        password = regPassword.getEditText().getText().toString();

        if(name.isEmpty() && username.isEmpty()  && email.isEmpty() && phoneNo.isEmpty() && password.isEmpty()
                || ((name.isEmpty()) ||  (username.isEmpty()) || (email.isEmpty()) || phoneNo.isEmpty() || password.isEmpty() )) {

            Toast.makeText(this, "Please Make sure all the details are entered correctly", Toast.LENGTH_SHORT).show();
        }
        else {
            result =true;
        }

        return result;
    }

    private void sendEmailVerification(){
        FirebaseUser firebaseUser = firebaseAuth.getCurrentUser();
        if(firebaseUser != null){

            firebaseUser.sendEmailVerification().addOnCompleteListener(new OnCompleteListener<Void>() {
                @Override
                public void onComplete(@NonNull Task<Void> task) {
                    if(task.isSuccessful()){
                       // sendUserData();
                        Toast.makeText(Sign_Up.this, "Successfully Registered, verification mail sent!", Toast.LENGTH_LONG).show();
                        firebaseAuth.signOut();
                        finish();
                        startActivity(new Intent(Sign_Up.this, Login.class));

                    }

                    else{
                        Toast.makeText(Sign_Up.this, "Verification mail has not been sent!", Toast.LENGTH_SHORT).show();
                    }
                }
            });
        }
    }

    private void sendUserData(){
        FirebaseDatabase firebaseDatabase = FirebaseDatabase.getInstance();
        DatabaseReference myRef = firebaseDatabase.getReference(firebaseAuth.getUid());

        UserHelperClass userHelperClass = new UserHelperClass(name,username,email,phoneNo,password);

        myRef.setValue(userHelperClass);

    }



}