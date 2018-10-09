#include "notification.h"
#include "ui_notification.h"
#include <QMediaMetaData>
#include <QUrl>
#include <QMediaPlayer>

Notification::Notification(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::Notification)
{
    ui->setupUi(this);
    player=new QMediaPlayer(this);
    loadDatabase();
    alarmConcept();
    ui->tableView->hide();
}

Notification::~Notification()
{
    delete ui;
}

void Notification::loadDatabase()
{
    QSqlTableModel *model=new QSqlTableModel();
    model->setTable("addboarder");
    model->select();
    qDebug()<<model->lastError();
    ui->tableView->setModel(model);
}

void Notification::alarmConcept()
{
    QSqlQuery query;
    eID=ui->tableView->model()->data(ui->tableView->model()->index(0, 0)).toInt();
    DateEntered=ui->tableView->model()->data(ui->tableView->model()->index(0, 1)).toString();
    qDebug()<<DateEntered;

    dateEntered=DateEntered;
    rDate=dateEntered.left(2);
    numberDate=rDate.toInt();
    qDebug()<<dateEntered;
    qDebug()<<rDate;
    qDebug()<<numberDate;

    CurrentDate=(QDate::currentDate());
    dueDate=CurrentDate.day();
    QString displayDueDate=QString::number(dueDate);
    ui->label->setText(displayDueDate);

    if(numberDate==dueDate){
        qDebug()<<"hello";
//        QMediaPlayer *player;
//            player->stop();
//            QString preview="C:\\alarm.mp3";
//            player->setMedia(QUrl::fromLocalFile(preview));
//            player->setVolume(100);
//            player->play();

//        Notification2 *notifs2=new Notification2;
//        notifs2->show();

        QMessageBox alarmSett;
        alarmSett.setText("PAGBAYAD NA!! :)");
        alarmSett.setStandardButtons(QMessageBox::Cancel);
        alarmSett.exec();
        player->setMedia(QUrl::fromLocalFile("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/audio/alarm.mp3"));
        //player->play();

        //player->stop();
    }
}
