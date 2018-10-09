#ifndef NOTIFICATION_H
#define NOTIFICATION_H

#include <QWidget>
#include "rents.h"
#include <QTimeEdit>
#include <QCalendarWidget>
#include <QDate>
#include <QDateEdit>
#include <QMessageBox>
#include <QtMultimedia/QSound>
#include <QMediaPlayer>

namespace Ui {
class Notification;
}

class Notification : public QWidget
{
    Q_OBJECT

public:
    explicit Notification(QWidget *parent = 0);
    ~Notification();
    void loadDatabase();
    QDate CurrentDate;
    int dueDate;

public slots:
    void alarmConcept();

private:
    Ui::Notification *ui;
    QMediaPlayer *player;
    int eID;
    QString DateEntered;
    QString dateEntered;
    QString rDate;
    int numberDate;
};

#endif // NOTIFICATION_H
