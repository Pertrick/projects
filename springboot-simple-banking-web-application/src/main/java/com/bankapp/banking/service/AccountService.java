package com.bankapp.banking.service;

import com.bankapp.banking.model.Account;

import java.util.List;

public interface AccountService {

    List<Account> allAccounts();

    Account getAccount(Integer accountId);

    Account createAccount(Account account);

    void deleteAccount(Integer accountId);
}
