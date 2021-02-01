package com.bankapp.banking.web;

import com.bankapp.banking.model.Account;
import com.bankapp.banking.service.AccountService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/")
public class AccountController {

    @Autowired
    private AccountService accountService;

    @PostMapping("account_info/{accountNumber}")
    public ResponseEntity<?> createAccount (@RequestParam String accountNumber, @RequestBody Account acount)

}
