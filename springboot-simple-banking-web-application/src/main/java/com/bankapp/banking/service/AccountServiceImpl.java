package com.bankapp.banking.service;

import com.bankapp.banking.model.Account;
import com.bankapp.banking.repository.AccountRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import javax.transaction.Transactional;
import java.util.List;

@Service
@Transactional
public class AccountServiceImpl implements AccountService{

    @Autowired
    private AccountRepository accountRepository;

    @Override
    public List<Account> allAccounts() {
        return accountRepository.findAll();
    }

    @Override
    public Account getAccount(Integer accountId) {
        return accountRepository.findById(accountId).orElse(null);
    }

    @Override
    public Account createAccount(Account account) {
        return accountRepository.save(account);
    }

    @Override
    public void deleteAccount(Integer accountId) {
        accountRepository.deleteById(accountId);
    }
}
