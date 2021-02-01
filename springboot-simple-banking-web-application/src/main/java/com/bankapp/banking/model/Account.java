package com.bankapp.banking.model;

import com.bankapp.banking.repository.AccountRepository;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
@Data
@NoArgsConstructor
@AllArgsConstructor
@Builder
public class Account {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private String accountName;

    private String accountNumber;

    private Double accountBalance;

    private Double transactionAmount;

    public void deposit(double amount){
        if (amount != 0) {
            this.accountBalance += amount;
            this.transactionAmount = amount;
        }
    }

    public void withdrawal(double amount) {
        if (amount != 0) {
            this.accountBalance -= amount;
            this.transactionAmount = -amount;
        }
    }
}
