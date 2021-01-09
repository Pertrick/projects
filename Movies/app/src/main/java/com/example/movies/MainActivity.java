package com.example.movies;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity implements tvShowsListener {
    private Button buttonAddToWatchList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        buttonAddToWatchList = findViewById(R.id.buttonAddToWatchList);

        final RecyclerView tvShowRecyclerView  = findViewById(R.id.tvShowsRecyclerView);

        //Here I'm preparing list of data locally, you can get it from an Api as well
        List<tvShow> tvShows = new ArrayList<>();

        tvShow extraction = new tvShow();
        extraction.image = R.drawable.extraction;
        extraction.name = "Extraction";
        extraction.rating = 5f;
        extraction.createdBy = "Sam Hargave";
        extraction.story = "Tyler Rake(Chris Hemsworth is tasked with extracting the son of a druglord amids an all-out drug war. " +
                "Battling hostiles and a troubled past along the way";
        tvShows.add(extraction);


        tvShow arrivals = new tvShow();
        arrivals.image = R.drawable.arrival;
        arrivals.name = "Arrivals";
        arrivals.rating = 4.5f;
        arrivals.createdBy ="Denis Villeneuve";
        arrivals.story="A linguist works with the military to communicate with alien lifeforms after twelve mysterious spacecrafts around the world.";
        tvShows.add(arrivals);

        tvShow mySpy = new tvShow();
        mySpy.image = R.drawable.myspy;
        mySpy.name = "My Spy";
        mySpy.rating = 5f;
        mySpy.createdBy = "Peter Segal";
        mySpy.story = "A hardened CIA operative finds himself at the mercy of a precious 9-year old girl, having been sent undercover to surveil her family";
        tvShows.add(mySpy);


        tvShow badBoysForLife = new tvShow();
        badBoysForLife.image = R.drawable.badboysforlife;
        badBoysForLife.name = "Bad Boys For Life";
        badBoysForLife.rating = 4.5f;
        badBoysForLife.createdBy ="Adil El Arbi, Bilall Fallah";
        badBoysForLife.story="Miami detectives Mike Lowrey and Marcus Burnett must face off against a mother-and-son pair of drug lords" +
                "who wreak vengeful havoc on their city";
        tvShows.add(badBoysForLife);

        tvShow knivesOut = new tvShow();
        knivesOut.image = R.drawable.knivesout;
        knivesOut.name = "Knives Out";
        knivesOut.rating = 5f;
        knivesOut.createdBy = "Rian Johnson";
        knivesOut.story = "A detective investigate thedeath of a patriarch of an eccentric, combative family.";
        tvShows.add(knivesOut);


        tvShow overComer = new tvShow();
        overComer.image = R.drawable.overcomer;
        overComer.name = "OverComer";
        overComer.rating = 4f;
        overComer.createdBy ="Alex Kendrick";
        overComer.story="A high-school basketball coach volunteers to coach a troubled teen in long-distance running";
        tvShows.add(overComer);

        tvShow theBanker = new tvShow();
        theBanker.image = R.drawable.thebanker;
        theBanker.name = "The Banker";
        theBanker.rating = 5f;
        theBanker.createdBy = "George Nolfi";
        theBanker.story = "In the 1960s two Africa-American entrepreneurs hire a working class white man to pretend to be the head of their " +
                "business empire while they pose as a janitor and chauffeur";
        tvShows.add(theBanker);


        tvShow theGentlemen = new tvShow();
        theGentlemen.image = R.drawable.thegentlemen;
        theGentlemen.name = "The Gentlemen";
        theGentlemen.rating = 4.7f;
        theGentlemen.createdBy ="Guy Ritchie";
        theGentlemen.story="An American expat tries to ell off his highly profitable marijuana empire in London, triggering plots, schemes, bribery and blackmail in an attempt to steal his domain out from under him";
        tvShows.add(theGentlemen);

        tvShow thePhotograph = new tvShow();
        thePhotograph.image = R.drawable.thephotograph;
        thePhotograph.name = "The Photograph";
        thePhotograph.rating = 4.8f;
        thePhotograph.createdBy ="Stella Meghie";
        thePhotograph.story="A series of intertwinning love stories set in the past and present";
        tvShows.add(thePhotograph);


        final tvShowdapter tvShowdapter = new tvShowdapter(tvShows,  this);
        tvShowRecyclerView.setAdapter(tvShowdapter);

        buttonAddToWatchList.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //following is the list of selected items in a recycler view.

                List<tvShow> selectedTvShows = tvShowdapter.getSelectedTvShows();

                StringBuilder tvShowNames = new StringBuilder();
                for(int i=0; i<selectedTvShows.size(); i++){
                    if(i==0){
                        tvShowNames.append(selectedTvShows.get(i).name);
                    }
                    else{
                        tvShowNames.append("\n").append(selectedTvShows.get(i).name);
                    }
                }

                Toast.makeText(MainActivity.this, tvShowNames.toString(), Toast.LENGTH_SHORT).show();

            }
        });


    }

    @Override
    public void onTvShowAction(Boolean isSelected) {
        if(isSelected){
            buttonAddToWatchList.setVisibility(View.VISIBLE);
        }

        else{
            buttonAddToWatchList.setVisibility(View.GONE);
        }

    }
    }
