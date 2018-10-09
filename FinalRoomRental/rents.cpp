#include "rents.h"
#include "ui_rents.h"

Rents::Rents(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::Rents)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/ggg");
    ui->label_2->setPixmap(pix);
    readSettings();
    loadDatabase();
    timer=new QTimer(this);
    timer->setInterval(1000);
    connect(timer, SIGNAL(timeout()), this, SLOT(update()));
    timer->start();
}

Rents::~Rents()
{
    writeSettings();
    delete ui;
}

void Rents::loadDatabase()
{
    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
        db.setHostName("localhost");
        db.setDatabaseName("database");
        db.setUserName("root");
        db.setPassword("root");

        if(!db.open()){
            qDebug()<<db.lastError();
            qFatal("Conection Failed!");
        }
        qDebug("Connected!");

        QSqlTableModel *model=new QSqlTableModel();
        model->setTable("addboarder");
        model->select();
        ui->tableView->setModel(model);
        ui->tableView->hide();
        model->rowCount();
        int roomOneTotalBoarders=0;
        int roomTwoTotalBoarders=0;
        int roomThreeTotalBoarders=0;
        int roomFourTotalBoarders=0;
        int roomFiveTotalBoarders=0;
        int roomSixTotalBoarders=0;
        int roomSevenATotalBoarders=0;
        int roomSevenBTotalBoarders=0;
        int roomSevenCTotalBoarders=0;
        int roomEightTotalBoarders=0;
        int roomSeventySevenTotalBoarders=0;
        int roomNinetyNineTotalBoarders=0;

        int roomOneMaxBoarders=1;
        int roomTwoMaxBoarders=4;
        int roomThreeMaxBoarders=4;
        int roomFourMaxBoarders=2;
        int roomFiveMaxBoarders=6;
        int roomSixMaxBoarders=4;
        int roomSevenAMaxBoarders=6;
        int roomSevenBMaxBoarders=4;
        int roomSevenCMaxBoarders=4;
        int roomEightMaxBoarders=4;
        int roomSeventySevenMaxBoarders=3;
        int roomNinetyNineMaxBoarders=4;

        int roomOneRemainingSlots=0;
        int roomTwoRemainingSlots=0;
        int roomThreeRemainingSlots=0;
        int roomFourRemainingSlots=0;
        int roomFiveRemainingSlots=0;
        int roomSixRemainingSlots=0;
        int roomSevenARemainingSlots=0;
        int roomSevenBRemainingSlots=0;
        int roomSevenCRemainingSlots=0;
        int roomEightRemainingSlots=0;
        int roomSeventySevenRemainingSlots=0;
        int roomNinetyNineRemainingSlots=0;

        for(int i=0; i<model->rowCount(); i++){
            QSqlQuery query;
            eID=ui->tableView->model()->data(ui->tableView->model()->index(i, 0)).toInt();
            RoomNumber=ui->tableView->model()->data(ui->tableView->model()->index(i, 2)).toInt();
            qDebug()<<RoomNumber;

            if(RoomNumber==1){
                roomOneTotalBoarders++;
            } else if(RoomNumber==2){
                roomTwoTotalBoarders++;
            } else if(RoomNumber==3){
                roomThreeTotalBoarders++;
            } else if(RoomNumber==4){
                roomFourTotalBoarders++;
            } else if(RoomNumber==5){
                roomFiveTotalBoarders++;
            } else if(RoomNumber==6){
                roomSixTotalBoarders++;
            } else if(RoomNumber==71){
                roomSevenATotalBoarders++;
            } else if(RoomNumber==72){
                roomSevenBTotalBoarders++;
            } else if(RoomNumber==73){
                roomSevenCTotalBoarders++;
            } else if(RoomNumber==8){
                roomEightTotalBoarders++;
            } else if(RoomNumber==77){
                roomSeventySevenTotalBoarders++;
            } else if(RoomNumber==99){
                roomNinetyNineTotalBoarders++;
            }
}
        roomOneRemainingSlots=roomOneMaxBoarders-roomOneTotalBoarders;
        roomTwoRemainingSlots=roomTwoMaxBoarders-roomTwoTotalBoarders;
        qDebug()<<roomTwoRemainingSlots;
        qDebug()<<roomTwoMaxBoarders;
        qDebug()<<roomTwoTotalBoarders;
        roomThreeRemainingSlots=roomThreeMaxBoarders-roomThreeTotalBoarders;
        roomFourRemainingSlots=roomFourMaxBoarders-roomFourTotalBoarders;
        roomFiveRemainingSlots=roomFiveMaxBoarders-roomFiveTotalBoarders;
        roomSixRemainingSlots=roomSixMaxBoarders-roomSixTotalBoarders;
        roomSevenARemainingSlots=roomSevenAMaxBoarders-roomSevenATotalBoarders;
        roomSevenBRemainingSlots=roomSevenBMaxBoarders-roomSevenBTotalBoarders;
        roomSevenCRemainingSlots=roomSevenCMaxBoarders-roomSevenCTotalBoarders;
        roomEightRemainingSlots=roomEightMaxBoarders-roomEightTotalBoarders;
        roomSeventySevenRemainingSlots=roomSeventySevenMaxBoarders-roomSeventySevenTotalBoarders;
        roomNinetyNineRemainingSlots=roomNinetyNineMaxBoarders-roomNinetyNineTotalBoarders;

        QString room1=QString::number(roomOneRemainingSlots);
        QString room2=QString::number(roomTwoRemainingSlots);
        QString room3=QString::number(roomThreeRemainingSlots);
        QString room4=QString::number(roomFourRemainingSlots);
        QString room5=QString::number(roomFiveRemainingSlots);
        QString room6=QString::number(roomSixRemainingSlots);
        QString room7A=QString::number(roomSevenARemainingSlots);
        QString room7B=QString::number(roomSevenBRemainingSlots);
        QString room7C=QString::number(roomSevenCRemainingSlots);
        QString room8=QString::number(roomEightRemainingSlots);
        QString room77=QString::number(roomSeventySevenRemainingSlots);
        QString room99=QString::number(roomNinetyNineRemainingSlots);

        if(roomOneRemainingSlots!=0){
            ui->comment->setText(room1);
        } else{
            ui->comment->setText("FULL!");
        }
        if(roomTwoRemainingSlots!=0){
            ui->comment2->setText(room2);
        } else{
            ui->comment2->setText("FULL!");
        }
        if(roomThreeRemainingSlots!=0){
            ui->comment3->setText(room3);
        } else{
            ui->comment3->setText("FULL!");
        }
        if(roomFourRemainingSlots!=0){
            ui->comment4->setText(room4);
        } else{
            ui->comment4->setText("FULL!");
        }
        if(roomFiveRemainingSlots!=0){
            ui->comment5->setText(room5);
        } else{
            ui->comment5->setText("FULL!");
        }
        if(roomSixRemainingSlots!=0){
            ui->comment6->setText(room6);
        } else{
            ui->comment6->setText("FULL!");
        }
        if(roomSevenARemainingSlots!=0){
            ui->comment7->setText(room7A);
        } else{
            ui->comment7->setText("FULL!");
        }
        if(roomSevenBRemainingSlots!=0){
            ui->comment8->setText(room7B);
        } else{
            ui->comment8->setText("FULL!");
        }
        if(roomSevenCRemainingSlots!=0){
            ui->comment9->setText(room7C);
        } else{
            ui->comment9->setText("FULL!");
        }
        if(roomEightRemainingSlots!=0){
            ui->comment10->setText(room8);
        } else{
            ui->comment10->setText("FULL!");
        }
        if(roomSeventySevenRemainingSlots!=0){
            ui->comment11->setText(room77);
        } else{
            ui->comment11->setText("FULL!");
        }
        if(roomNinetyNineRemainingSlots!=0){
            ui->comment12->setText(room99);
        } else{
            ui->comment12->setText("FULL!");
        }

        QSqlTableModel *model2=new QSqlTableModel();
        model2->setTable("addboarder");
        model2->select();
        ui->tableView_2->setModel(model2);
        ui->tableView_2->setColumnWidth(2, 127);
        ui->tableView_2->setColumnWidth(4, 136);
        ui->tableView_2->setColumnWidth(7, 136);
        ui->tableView_2->hideColumn(0);
        ui->tableView_2->hideColumn(1);
        ui->tableView_2->hideColumn(3);
        ui->tableView_2->hideColumn(5);
        ui->tableView_2->hideColumn(6);
        ui->tableView_2->hideColumn(8);
        ui->tableView_2->hideColumn(9);
        ui->tableView_2->hideColumn(10);
        ui->tableView_2->hideColumn(11);
        ui->tableView_2->hideColumn(12);
        ui->tableView_2->hideColumn(13);
}

void Rents::readSettings()
{
    QSettings settings("Gian Sacay");
    settings.beginGroup("Rents");
    resize(settings.value("size", QSize(400, 400)).toSize());
    move(settings.value("pos", QPoint(200, 200)).toPoint());
    settings.endGroup();
}

void Rents::writeSettings()
{
    QSettings settings("Gian Sacay");
    settings.beginGroup("Rents");
    settings.setValue("size", size());
    settings.setValue("pos", pos());
    settings.endGroup();
}

void Rents::records()
{

}

void Rents::on_add_clicked()
{
    AddBoarder *add=new AddBoarder;
    this->hide();
    add->show();
}

void Rents::on_edit_clicked()
{
    EditWindow *edit=new EditWindow;
    this->hide();
    edit->show();
}

void Rents::on_delete_2_clicked()
{
    DeleteBoarder *del=new DeleteBoarder;
    this->hide();
    del->show();
}

void Rents::on_logout_clicked()
{
    AdminGuest *aG=new AdminGuest;
    this->hide();
    aG->show();
}

void Rents::update()
{
    QSqlTableModel *model=new QSqlTableModel();
    model->setTable("list");
    model->select(); //< fetch data
}
